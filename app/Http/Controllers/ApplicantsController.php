<?php

/**
 * Manages an Applicant in the Database
 */

namespace App\Http\Controllers;


use App\Applicant;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Requests;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ApplicantsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // Query
        $allApplicants = DB::table('applicants')
            ->leftjoin('adresses', 'adresses.applicant_id', '=', 'applicants.id')
            ->select('applicants.salutation', 'applicants.firstname', 'applicants.lastname', 'applicants.birthdate', 'adresses.city')
            ->paginate(5);

        return view('applicants.applicantslist', compact('allApplicants'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('applicants.addapplic');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $applicant = Applicant::findOrFail($id);
        return view('applicants.applicant', compact('applicant'));
    }

    /**
     * Save the form for posting a new entry into the ressource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        Applicant::create([
            'salutation' => request('salutation'),
            'firstname' => request('firstname'),
            'lastname' => request('lastname'),
            'user_id' => '1',
            'address_id' => '123'
        ]);

        return redirect('/applic');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $applicant = Applicant::findOrFail($id);

        if (!empty($applicant)) {
            Applicant::update();

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

}