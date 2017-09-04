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
		$profile = $this->levelup->get_profile();
		$points = $this->levelup->get_points();

        Session::put('levelup_points', $points);
        Session::put('levelup_firstname', $profile->firstname);

        //TODO: Please Not Chris, I needed the points and dailys complete on other pages, so I'm calling it from a global function in Helpers.php for now.
        //Check user profile is complete and completed all challenges for today
        $dailys_complete = 0;

        return view('home.index',compact('content','profile','dailys_complete','points'));
    }
}
