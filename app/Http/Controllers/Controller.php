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
    	$levelup_authenticate = Session::get('levelup_authenticate');
    	$levelup_hashcode = Session::get('levelup_hashcode');
    	if(empty($levelup_authenticate) || empty($levelup_hashcode)){
    		throw new Exception("Error Processing LevelUpSetup Request", 1);
    	}

    	$levelupapi = new LevelUpApi;
    	$levelupapi->set_token($levelup_authenticate->token);
        $levelupapi->set_hashcode($levelup_hashcode);

    	return $levelupapi;
    }
}
