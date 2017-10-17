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

        $dailys_complete = Challenge::completed_featured_challenges($this->levelup);
        Session::put('levelup_dailys_complete', $dailys_complete);

        return view('home.index',compact('content'));
    }

    public function survey()
    {
        if(getenv('GOOGLE_SURVEY_ID') == "false"){
            Session::flash('flash_error', 'The survery has expired');
            return redirect()->route('home.index');
        }
        return view('home.survey');
    }
}
