<?php

namespace App\Http\Requests;

use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;

class RegisterPostRequest extends FormRequest
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
    public function rules(Request $request)
    {
        return [
            'firstname' => 'required|min:3|max:50',
            'lastname' => 'required|min:3|max:50',
            'mobilenumber' => 'required|phone:AUTO,NA',
            'password' => 'required|max:100',
        ];
    }
}
