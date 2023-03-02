<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|max:42',
            'username' => ['required', Rule::unique('users', 'username')],
            'file' => 'mimes:jpeg,png,jpg,gif',
            'gender' => 'required',
            'city' => 'required',
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'description' => 'max:420',
            'password' => 'required|min:8|max:42|confirmed'
        ];
    }
}
