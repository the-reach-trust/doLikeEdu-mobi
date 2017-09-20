<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use App\Models\AppUser;
use App\Services\LevelUpApi;

use Session;
use Log;

class ProfilePostRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $levelupapi = new LevelUpApi;
        $levelup_authentication = Session::get('levelup_authentication');
        $levelup_hashcode = Session::get('levelup_hashcode');
        $levelupapi->set_token($levelup_authentication->token);
        $levelupapi->set_hashcode($levelup_hashcode);
        $schools_api = $levelupapi->get_location_school('NA','NA');

        $schools = [];
        foreach ($schools_api as $school) {
            $schools[$school->schoolcode] = $school->school;
        }
        return [
            'firstname' => 'required|min:3|max:50',
            'lastname' => 'required|min:3|max:50',
            'gender' => 'nullable|in:' . implode(',', array_keys(AppUser::GENDERS)),
            'grade' => 'nullable|in:' . implode(',', array_keys(AppUser::GRADES)),
            'schoolcode' => 'nullable|in:' . implode(',', array_keys($schools))
        ];
    }
}
