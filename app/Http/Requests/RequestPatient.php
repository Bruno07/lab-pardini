<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestPatient extends FormRequest
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
            'patient.name' => 'required|max:80',
            'patient.lastname' => 'required|max:100',
            'patient.birth' => "required|date_format:d/m/Y",
            'patient.email' => 'required|max:200',
            'addresses.*.postal_code' => 'required|max:25',
            'addresses.*.address' => 'required|max:25',
            'addresses.*.number' => 'required|max:10',
            'addresses.*.neighborhood' => 'required|max:100',
            'addresses.*.town' => 'required|max:100',
            'addresses.*.state' => 'required|max:100',
            'contacts.*.number' => 'required|max:25',
            'contacts.*.type' => 'required|max:25',
        ];
    }

    /**
     * @return array|string[]
     */
    public function attributes()
    {
        return [
            'patient.name' => 'nome',
            'patient.lastname' => 'sobrenome',
            'patient.birth' => 'nascimento',
            'patient.email' => 'email',
            'addresses.*.postal_code' => 'CEP',
            'addresses.*.address' => 'endereço',
            'addresses.*.number' => 'número',
            'addresses.*.neighborhood' => 'bairro',
            'addresses.*.town' => 'cidade',
            'addresses.*.state' => 'estado',
            'contacts.*.number' => 'telefone',
            'contacts.*.type' => 'tipo do contato'
        ];
    }
}
