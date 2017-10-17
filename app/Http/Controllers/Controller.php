<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use Session;
use Log;

use App\Services\LevelUpApi;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected function LevelUpSetup()
    {
        $levelup_authentication = Session::get('levelup_authentication');
        $levelup_hashcode = Session::get('levelup_hashcode');
        if(empty($levelup_authentication) || empty($levelup_hashcode)){
            Session::flush();

            Session::flash('flash_error', 'Your session has expired');
            \Redirect::to('/')->send();
        }

        $levelupapi = new LevelUpApi;
        $levelupapi->set_token($levelup_authentication->token);
        $levelupapi->set_hashcode($levelup_hashcode);

        return $levelupapi;
    }
}
