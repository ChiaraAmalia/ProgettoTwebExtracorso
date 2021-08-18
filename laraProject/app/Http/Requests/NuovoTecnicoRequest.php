<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class NuovoTecnicoRequest extends FormRequest {

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
            'nome' => 'required|string',
            'cognome' => 'required|string',
            'codice_centro'=>'required',
            'email' => 'required|string|email|unique:users|max:255',
            'username' => 'required|string|min:8|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'via' => 'required|string',
            'citta' => 'required|string',
            'cap' => 'required|numeric',
            'cellulare' =>'numeric',
            'sesso' => 'required|string',           
        ];
    }

}

