<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;

use App\Http\Requests\ProfilePasswordPostRequest;
use App\Http\Requests\ProfilePostRequest;

use App\Models\AppUser;

use Session;

class ProfileController extends AppController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $levelup_authentication = Session::get('levelup_authentication');
        $userid = $levelup_authentication->userid;
        //$profile = $levelup->get_profile();
        $schools = array(1=> 'A School');

        return view('profile.index',compact('profile','schools','userid'));
    }

    public function update(ProfilePostRequest $request)
    {
        //dd($request);
        return view('profile.complete');
    }

    public function school()
    {

    }

    public function password()
    {
        //$profile = $levelup->get_profile();
        return view('profile.password',compact('profile'));
    }

    public function password_update(ProfilePasswordPostRequest $request)
    {
        dd($request);
    }
}
