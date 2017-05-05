<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

/** #################### Authentication and Registration Pages ############### */


Auth::routes();

Route::get('/home', 'HomeController@index');

/**
 * Register User and Activation Logic
 */
Route::post('register', 'Auth\RegisterController@register');

/**
 *
 */
Route::get('activation/{token}', '\App\ActivationService@activateUser')->name('user.activate');


/** ######################## General Pages ################################## */


/**
 * Home Page
 */
Route::get('/', function () {
    return view('welcome', ['pageName' => 'Bundespolizei - Bewerberportal']);
});


/**
 * About-Page
 */
Route::get('/about', function () {
    return view('about', ['pageName' => 'Impressum']);
});


/** #################### Applicant ###################################### */


/**
 * GET all Applicants
 */
Route::get('/applic/create', 'ApplicantsController@create');

/**
 * GET a SPECIFIC Applicant
 */
Route::get('/applic/{id}', 'ApplicantsController@show');

/**
 * PUT Applicant
 */
Route::post('/applic/post', 'ApplicantsController@store');

/**
 * GET all Applicants
 */
Route::get('/applic', 'ApplicantsController@index');



/**
 * PATCH Applicant
 */
//Route::patch('applc/patch', 'ApplicantsController@modify');



/**
 * DELETE A Applicant
 */
//Route::delete('/applc/delete/{id}', function ($id) {
//    \App\Applicant::findOrFail($id)->delete();
//    return redirect('/bewerbers');
//});


 /** ###################### Job Opportunity #################################### */

/**
 * GET a SPECIFIC Job
 */
Route::get('/job/{id}', 'JobController@show');

/**
 * GET Jobs
 */
Route::get('/job', 'JobController@index');


/**
 * PUT a Job
 */
//Route::post('job/put', ['as' => 'applicantinfo', 'uses' => 'ApplicantsController@store']);

/**
 * PATCH a Job
 */
//Route::patch('job/patch', ['as' => 'applicantinfo', 'uses' => 'ApplicantsController@store']);


/**
 * DELETE A Job
 */
//Route::delete('/job/delete/{id}', 'JobController@destroy');

/** ###################### Error Testing #################################### */

Route::get('503', function () {
    abort(503);
});

Route::get('500', function () {
    abort(500);
});

Route::get('404', function () {
    abort(404);
});
