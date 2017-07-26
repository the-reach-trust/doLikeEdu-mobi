<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;

use Session;

use App\Http\Requests\LoginPostRequest;
use App\Models\AccessMode;
use App\Services\LevelUpApi;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function register()
    {
        return view('auth.register');
    }

    public function register_post(AuthPostRequest $request)
    {

    }

    public function login()
    {
		return view('auth.login');
    }

    public function login_post(LoginPostRequest $request)
    {
        $levelup = new LevelUpApi;

        $access_token = $request->mobilenumber.":".$request->password;
        $mode = AccessMode::GUEST_ACCESS;

        $levelup_authenticate = $levelup->authenticate($mode,$access_token);

        Session::put('levelup_authenticate', $levelup_authenticate);
        Session::put("levelup_hashcode",md5('LevelUp-'.$levelup_authenticate->userid));
        Session::put('access_token', $access_token);
        Session::put('mode', $mode);

        Session::flash('flash_success', 'Successfully logged in!');
        return \Redirect::route('home.index');
    }
}
