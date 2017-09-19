<?php

namespace App\Http\Requests;

use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;

class ChallengePostRequest extends FormRequest
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
            'answer' => 'required|numeric',
        ];
    }
}
