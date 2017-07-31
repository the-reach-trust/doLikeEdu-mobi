<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;

class AppController extends Controller
{
    protected $levelup;

    public function __construct() {
        $this->middleware('user.lu');

        //Work around to setup levelupAPI
        $this->middleware(function ($request, $next) {
            $this->levelup = $this->LevelUpSetup();
            return $next($request);
        });
    }
}
