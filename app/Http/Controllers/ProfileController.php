<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;

use App\Http\Requests\ProfilePasswordPostRequest;

use App\Models\AppUser;

class ProfileController extends AppController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$profile = $levelup->get_profile();
        $schools = array(1=> 'A School');

        return view('profile.index',compact('profile','schools'));
    }

    public function update(Request $request)
    {
        dd($request);
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
