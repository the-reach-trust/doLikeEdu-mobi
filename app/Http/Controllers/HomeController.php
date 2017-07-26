<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;

class HomeController extends Controller
{
    public function __construct() {
        $this->middleware('LUuser');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $levelup = $this->LevelUpSetup();
        $content = $levelup->get_content();
        //$profile = $levelup->get_profile();

        return view('home.index',compact('content','profile'));
    }
}
