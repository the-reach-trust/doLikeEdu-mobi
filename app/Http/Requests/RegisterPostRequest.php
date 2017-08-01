<?php

namespace App\Http\Requests;

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
    public function rules()
    {
        return [
            'mobilenumber' => 'required|max:14|regex:/^\d*$/|phone:AUTO,ZA',
            'password' => 'required|max:100',
        ];
    }
}
