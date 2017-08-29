<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\AppUser;

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
        return [
            'name' => 'required|min:6|max:100',
            'gender' => 'required|in:' . implode(',', array_keys(AppUser::GENDERS)),
            'grade' => 'required|numeric|in:' . implode(',', array_keys(AppUser::GRADES)),
            'school' => 'required|numeric'
        ];
    }
}
