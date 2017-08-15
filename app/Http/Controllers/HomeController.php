<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;

use Session;

class HomeController extends AppController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $content = $this->levelup->get_content();
        //$profile = $levelup->get_profile();

        //TODO: Faking it for now
        $points = (object) array('points' => 0);
        $points->tokens = 0;
        $points->level = 1;

        Session::put('levelup_points', $points);

        $dailys_complete = rand(0,1) == 1;

        return view('home.index',compact('content','profile','dailys_complete','points'));
    }
}
