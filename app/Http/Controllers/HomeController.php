<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;

use App\Models\Challenge;

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

        $challenges_param = array('type'=>"featured",'count'=>1);
        $challenges_featured = $this->levelup->get_challenges($challenges_param);
        //Completed all challenges for today
        $dailys_complete = Challenge::completed_featured_challenges($this->levelup);

        Session::put('levelup_points', $points);
        Session::put('levelup_firstname', $profile->firstname);
        Session::put('levelup_dailys_complete', $dailys_complete);

        return view('home.index',compact('content','profile','dailys_complete','challenges_featured'));
    }
}
