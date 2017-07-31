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
    public function __construct() {
        $this->middleware('user.guest');
    }

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

        $levelup_authentication = $levelup->authenticate($mode,$access_token);

        Session::put('levelup_authentication', $levelup_authentication);
        Session::put("levelup_hashcode",md5('LevelUp-'.$levelup_authentication->userid));
        Session::put('access_token', $access_token);
        Session::put('mode', $mode);

        Session::flash('flash_success', 'Successfully logged in!');
        return \Redirect::route('home.index');
    }

    public function logout(){
        Session::flush();

        Session::flash('flash_success', 'Successfully logged out!');
        return \Redirect::to('/');
    }
}
