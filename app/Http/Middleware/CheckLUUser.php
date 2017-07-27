<?php

namespace App\Http\Middleware;

use Closure;
use Session;
use Log;

class CheckLUUser {
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {

    	$levelup_authentication = Session::get('levelup_authentication');
    	if(empty($levelup_authentication)){
    		$reason = "Not logged in.";
            return response()->view('errors.403', compact('reason'));
    	}

    	return $next($request); 
    }
}
