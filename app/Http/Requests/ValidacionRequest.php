<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidacionRequest extends FormRequest
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
            'nick' => ['required', 'max:20', 'unique:users'],
            'nombre' => ['required', 'max:20', 'regex:/^[\pL\s\-]+$/u'],
            'apellidos' => ['required', 'max:20', 'regex:/^[\pL\s\-]+$/u'],
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required', 'min:8', 'max:12'],
            'imagen' => ['required', 'image']
        ];
    }

    public function messages(){

        return [
            'nick.required' => 'El campo nick es obligatorio',
            'nick.max' => 'El campo nick debe contener un máximo de 20 caracteres',
            'nick.unique' => 'El nick que intenta introducer ya existe',
            'nombre.required' => 'El campo nombre es obligatorio',
            'nombre.max' => 'El campo nombre debe contener un máximo de 20 caracteres',
            'nombre.regex' => 'El campo nombre solo permite letras',
            'apellidos.required' => 'El campo apellidos es obligatorio',
            'apellidos.max' => 'El campo apellidos debe contener un máximo de 20 caracteres',
            'apellidos.regex' => 'El campo apellidos solo permite letras',
            'email.required' => 'El campo email es obligatorio',
            'email.email' => 'Introduzca un email válido',
            'email.unique' => 'El email que intenta introducir ya existe',
            'password.required' => 'El campo contraseña es obligatorio de mínimo 8 caracteres y máximo 12',
            'password.min' => 'El campo contraseña debe contener al menos 8 caracteres',
            'password.max' => 'El campo contraseña debe contener un máximo de 12 caracteres',
            'imagen.required' => 'el campo imagen es obligatorio'
        ];
    }
}
