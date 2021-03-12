<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\User;

class CreateUserRequest extends FormRequest
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
            'name' => ['required', 'regex:/[a-zA-Z]+/'],
            'email' => ['required', 'email']
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'El nombre es obligatorio',
            'name.regex' => 'El nombre solo puede tener letras',
            'email.required' => 'El email es obligatorio',
            'email.email' => 'El email no es válido'
        ];
    }

    public function createUser(){

        $user = new User;

        $user->forceFill([
            'name' => $this->name,
            'password' => bcrypt(str_random(8)),
            'email' => $this->email
        ]);

        $user->save();
    }
}
