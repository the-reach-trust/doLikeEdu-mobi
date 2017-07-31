<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;

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
        return view('profile.index',compact('profile'));
    }

    public function update(Request $request)
    {
        dd($request);
    }

    public function school()
    {

    }
}
