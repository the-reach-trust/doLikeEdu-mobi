<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Redirect;

use Closure;
use Session;
use Log;

class CheckGuestUser {
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {

    	$levelup_authentication = Session::get('levelup_authentication');
    	if(!empty($levelup_authentication) && !$this->is_logout($request->route())){
    		return Redirect::to('home');
    	}

    	return $next($request); 
    }

    private function is_logout($route) {
        $actions = $route->getAction();

        if(isset($actions['logout']) && $actions['logout'] == true){
            return true;
        }
        return false;
    }
}
