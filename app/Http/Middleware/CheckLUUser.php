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

    	$levelup_authenticate = Session::get('levelup_authenticate');
    	if(empty($levelup_authenticate)){
    		$reason = "Not logged in.";
            return response()->view('errors.403', compact('reason'));
    	}

    	return $next($request); 
    }
}
