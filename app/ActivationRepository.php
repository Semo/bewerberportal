<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Connection;

/**
 * This class enables the Website to force a new user to
 * validate his Email address and creates afterwards a
 * secure token to be used for the session cache
 *
 * Class ActivationRepository
 * @package App
 */
class ActivationRepository
{
    protected $db;
    protected $table = 'user_activations';

    /**
     * ActivationRepository constructor.
     * @param Connection $connection
     */
    public function __construct(Connection $connection)
    {
        $this->db = $connection;
    }

    /**
     * Finds out whether an activation has taken place and if no,
     * then it creates a new one or regenerates one if yes.
     *
     * @param $user
     * @return string
     */
    public function createActivation($user)
    {
        $activation = $this->getActivation($user);

        if (!$activation) {
            return $this->createToken($user);
        }
        return $this->regenerateToken($user);
    }

    /**
     * Simply retrieves a token from the database.
     *
     * @param $user
     * @return array|null|\stdClass
     */
    public function getActivation($user)
    {
        return $this->db->table($this->table)->where('user_id', $user->id)->first();
    }

    /**
     * Inserts a new token into the database.
     *
     * @param $user
     * @return string
     */
    private function createToken($user)
    {
        $token = $this->getToken();
        $this->db->table($this->table)->insert([
            'user_id' => $user->id,
            'token' => $token,
            'created_at' => new Carbon()
        ]);
        return $token;
    }

    /**
     * Makes a token with SHA256
     *
     * @return string
     */
    protected function getToken()
    {
        return hash_hmac('sha256', str_random(40), config('app.key'));
    }

    /**
     * @param $user
     * @return string
     */
    private function regenerateToken($user)
    {
        $token = $this->getToken();
        $this->db->table($this->table)->where('user_id', $user->id)->update([
            'token' => $token,
            'created_at' => new Carbon()
        ]);
        return $token;
    }

    /**
     * @param $token
     * @return array|null|\stdClass
     */
    public function getActivationByToken($token)
    {
        return $this->db->table($this->table)->where('token', $token)->first();
    }

    /**
     * @param $token
     */
    public function deleteActivation($token)
    {
        $this->db->table($this->table)->where('token', $token)->delete();
    }
}