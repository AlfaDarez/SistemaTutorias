<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateContactoBDT extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
        'nombre_responsable'=>'required|string',
        'cargo_responsable'=>'required|string',
        'telefono_responsable'=>'required|digits:10|numeric',
        'celular_responsable'=>'required|digits:10|numeric',
        'correo_responsable'=>'required|email',
        'nombre_encargado'=>'required|string',
        'cargo_encargado'=>'required|string',
        'telefono_encargado'=>'required|digits:10|numeric',
        'celular_encargado'=>'required|digits:10|numeric',
        'correo_encargado'=>'required|email',

        ];
    }
    public function messages()
    {
        return [
            'nombre_responsable.required'=>'El nombre del responsable es requerido',
            'nombre_encargado.required'=>'El nombre del encargado es requerido',
            'cargo_responsable.required'=>'El  puesto del responsable es importante',
            'cargo_encargado.required'=>'El  puesto del encargado es importante',
            'telefono_responsable.required'=>'Es importante el numero de telefono',
            'telefono_responsable.digits'=>'El teléfono debe tener exactamente 10 dígitos.',
            'telefono_responsable.numeric'=>'El teléfono debe contener solo números.',
            'telefono_encargado.required'=>'Es importante el numero de telefono',
            'telefono_encargado.digits'=>'El teléfono debe tener exactamente 10 dígitos.',
            'telefono_encargado.numeric'=>'El teléfono debe contener solo números.',
            'celular_responsable.required'=>'Es importante el numero de telefono',
            'celular_responsable.digits'=>'El teléfono debe tener exactamente 10 dígitos.',
            'celular_responsable.numeric'=>'El teléfono debe contener solo números.',
            'celular_encargado.required'=>'Es importante el numero de telefono',
            'celular_encargado.digits'=>'El teléfono debe tener exactamente 10 dígitos.',
            'celular_encargado.numeric'=>'El teléfono debe contener solo números.',
            'correo_responsable.required'=>'El correo del responsable es importante',
            'correo_encargado.required'=>'El correo del responsable es importante',
            'correo_responsable.email'=>'El correo debe de ser Valido',
            'correo_encargado.email'=>'El correo debe de ser Valido',





        ];
    }
}
