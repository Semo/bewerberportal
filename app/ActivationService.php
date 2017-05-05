<?php

namespace App;

use Illuminate\Mail\Mailer;
use Illuminate\Mail\Message;

class ActivationService
{

    protected $mailer;

    protected $activationRepo;

    protected $resendAfter = 24;

    /**
     * ActivationService constructor.
     * @param Mailer $mailer
     * @param ActivationRepository $activationRepository
     */
    public function __construct(Mailer $mailer, ActivationRepository $activationRepository)
    {
        $this->mailer = $mailer;
        $this->activationRepo = $activationRepository;
    }

    /**
     * Delegates token creation if user doesn't exist and time interval wasn't completed and mails the token
     *
     * @param $user
     */
    public function sendActivationMail($user)
    {
        if ($user->isValidAndActive == 0 || $this->timeGap($user)) {


            $token = $this->activationRepo->createActivation($user);
            $link = route('user.activate', $token);
            $message = sprintf('Activate account <a href="%s">"%s"</a>', $link, 'stuff');

            $this->mailer->raw($message, function (Message $m) use ($user) {
                $m->to($user->email)->subject('Activation mail');
            });
        }
        return;
    }

    /**
     * Has a time interval of 24h been run down?
     *
     * @param $user
     * @return bool
     */
    private function timeGap($user)
    {
        $activation = $this->activationRepo->getActivation($user);
        return $activation === null || strtotime($activation->created_at) + 60 * 60 * $this->resendAfter < time();
    }

    /**
     * Activates an user and removes the data from the intermediate user_activation table,
     *
     * @param $token
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|null
     */
    public function activateUser($token)
    {
        $activation = $this->activationRepo->getActivationByToken($token);

        if ($activation === null) {
            // TODO throw unknown register Token exception, log and redirect to register view.
            return null;
        }

        $user = User::find($activation->user_id);
        $user->isValidAndActive = 1;
        $user->save();
        $this->activationRepo->deleteActivation($token);

//        return $user;
        return redirect('login');
    }

}