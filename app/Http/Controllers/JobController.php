<?php

namespace App\Http\Controllers;


use App\Job;
use Illuminate\Http\Request;

class JobController extends Controller
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
//        $product = session()->put('stuff_var', 'stuff');
        $alljobs = Job::paginate(5);
        return view('jobs.joblist', compact('alljobs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $job = new Job();
        $job->job_reference = $request->job_reference;
        $job->place_of_employment = $request->location;
        $job->wage_group = $request->wage;
        $job->career = $request->career;
        $job->remit = $request->remit;
        $job->requirements = $request->requirements;
        $job->comments = $request->comments;

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $job = Job::findOrFail($id);

        return view('jobs.job', compact('job'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        \App\Applicant::findOrFail($id)->delete();
        return view('/bewerbers');   //
    }


    public function incrementVersion(Request $request)
    {
        DB::table('job')->whereId($request->id)->increment('version');
    }

}
