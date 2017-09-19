<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;

use App\Http\Requests\ProfilePasswordPostRequest;
use App\Http\Requests\ProfilePostRequest;

use App\Models\AppUser;
use App\Models\HttpCodes;

use Session;

class ProfileController extends AppController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $levelup_authentication = Session::get('levelup_authentication');
        $userid = $levelup_authentication->userid;
        $profile = $this->levelup->get_profile();
        $schools_api = $this->levelup->get_location_school('NA','NA');
        $schools = [];
        foreach ($schools_api as $school) {
            $schools[$school->schoolcode] = $school->school;
        }

        return view('profile.index',compact('profile','schools','userid'));
    }

    public function update(ProfilePostRequest $request)
    {
        $profile['firstname']   = $request->firstname;
        $profile['lastname']   = $request->lastname;
        $profile['gender']      = (int)$request->gender;
        $profile['grade']       = (int)$request->grade;
        $profile['schoolcode']  = (int)$request->schoolcode;

        $this->levelup->set_profile($profile);
        if($this->levelup->get_last_http_status() != HttpCodes::HTTP_OK){
            Session::flash('flash_error', 'Error with updating profile please try again!');
            return redirect()->back()->withInput();
        }

        //Update session data
        $points = $this->levelup->get_points();
        $profile = $this->levelup->get_profile();
        Session::put('levelup_firstname', $profile->firstname);
        Session::put('levelup_points', $points);

        Session::flash('flash_success', 'Successfully updated profile!');
        if(/*$profile->complete*/ false){
            return \Redirect::route('profile.complete');
        }else{
            return redirect()->back();
        }
    }

    public function complete()
    {
        return view('profile.complete');
    }

    public function password()
    {
        return view('profile.password');
    }

    public function password_update(ProfilePasswordPostRequest $request)
    {
        $this->levelup->credentials(Session::get('mode'),$request->password);
        if($this->levelup->get_last_http_status() != HttpCodes::HTTP_OK){
            Session::flash('flash_error', 'Error with updating password please try again!');
            return redirect()->back()->withInput();
        }

        Session::flash('flash_success', 'Successfully updated password!');
        return \Redirect::route('home.index');
    }
}
