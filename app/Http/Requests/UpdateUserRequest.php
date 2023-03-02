<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
        dd($this->request);

        return [
            'name' => 'required|max:255|min:4',
            'gender' => 'required',
            'username' => ['required','min:4','max:255', Rule::unique('users', 'username')->ignore(auth()->user())],
            'city' => 'required|max:255',
            'email' => 'required|email|max:255',
            'description' => 'nullable|max:420',
            // @todo Implement MatchOldPassword rule 
            'current_password' => 'required|min:8|max:42|current_password',
            'password' => $this->password != null ? 'sometimes|min:8|max:42|confirmed' : '',
        ];
    }
}
