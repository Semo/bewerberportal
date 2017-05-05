<?php

namespace App\Http\Controllers;

use App\Addresses;
use Illuminate\Http\Request;

class AdressController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the address of the corresponging applicant.
     *
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $address = Addresses::findOrFail($id);
        return view('address.address', compact('address'));
    }

    public function store()
    {
        Addresses::create([
            'applicant_id' => request('applicid'),
            'street' => request('street'),
            'state' => request('state'),
            'zipcode' => request('zipcode'),
            'city' => request('city')
        ]);

        return redirect();
    }

}
