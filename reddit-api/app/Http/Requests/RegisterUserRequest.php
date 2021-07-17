<?php

namespace App\Http\Requests;

use App\Rules\AllLowerCase;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RegisterUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
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
            "username" => ["required", "alpha_dash", "min:3", new AllLowerCase(), Rule::unique('users')],
            "email" => ["required", "email", Rule::unique('users')],
            "password" => ["required", "alpha_num", "confirmed"]
        ];
    }
}
