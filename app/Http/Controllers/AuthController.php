<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;

use Session;

use App\Http\Requests\LoginPostRequest;
use App\Http\Requests\RegisterPostRequest;
use App\Models\AccessMode;
use App\Models\AppUser;
use App\Models\HttpCodes;
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

    public function register_post(RegisterPostRequest $request)
    {
        $levelup = new LevelUpApi;

        $access_token = $request->mobilenumber.":".$request->password;
        $mode = AccessMode::MOBILE_NUMBER_ACCESS;

        if(AppUser::exists($levelup,$mode,$request->mobilenumber)){
            return redirect()->back()->withErrors(['mobilenumber' =>'Mobile Number already exists'])->withInput();
        }

        $levelup_authentication = $levelup->register($mode,$access_token);

        if($levelup->get_last_http_status() != HttpCodes::HTTP_OK){
            Session::flash('flash_error', 'Error with creating account please try again!');
            return redirect()->back()->withInput();
        }

        $profile = array(
                            'firstname' => $request->firstname,
                            'lastname' => $request->lastname,
                        );
        $this->levelup_setup($levelup_authentication,$access_token,$mode,$profile);

        Session::flash('flash_success', 'Successfully created an account!');
        return \Redirect::route('home.index');
    }

    public function login()
    {
		return view('auth.login');
    }

    public function login_post(LoginPostRequest $request)
    {
        $levelup = new LevelUpApi;

        $access_token = $request->mobilenumber.":".$request->password;
        $mode = AccessMode::MOBILE_NUMBER_ACCESS;

        if(!AppUser::exists($levelup,$mode,$request->mobilenumber)){
            return redirect()->back()->withErrors(['mobilenumber' =>'Mobile Number not found'])->withInput();
        }

        $levelup_authentication = $levelup->authenticate($mode,$access_token);

        if($levelup->get_last_http_status() != HttpCodes::HTTP_OK){
            Session::flash('flash_error', 'Error with authorizing account please try again!');
            return redirect()->back()->withInput();
        }

        $this->levelup_setup($levelup_authentication,$access_token,$mode);

        Session::flash('flash_success', 'Successfully logged in!');
        return \Redirect::route('home.index');
    }

    public function logout(){
        Session::flush();

        Session::flash('flash_success', 'Successfully logged out!');
        return \Redirect::to('/');
    }

    public function levelup_setup($levelup_authentication,$access_token,$mode,$profile=null)
    {
        $levelup_hashcode = md5('LevelUp-'.$levelup_authentication->userid);
        Session::put('levelup_authentication', $levelup_authentication);
        Session::put("levelup_hashcode",$levelup_hashcode);
        Session::put('access_token', $access_token);
        Session::put('mode', $mode);

        $levelup = new LevelUpApi;
        $levelup->set_token($levelup_authentication->token);
        $levelup->set_hashcode($levelup_hashcode);
        if(!is_null($profile) ){
            $levelup->set_profile($profile);
        }
        $points = $levelup->get_points();
        $profile = $levelup->get_profile();
        $quiz_completed = 0;

        foreach ($levelup->get_challenge_progress() as $category) {
            $quiz_completed+= $category->completed;
        }

        Session::put('levelup_points', $points);
        Session::put('levelup_quiz_completed', $quiz_completed);
        Session::put('levelup_firstname', $profile->firstname);
        Session::flash('flash_welcome_msg', true);
    }
}
