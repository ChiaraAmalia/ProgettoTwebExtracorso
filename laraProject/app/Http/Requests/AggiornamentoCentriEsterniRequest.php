<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AggiornamentoCentriEsterniRequest extends FormRequest {

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
            'nome_centro' => 'required|string',
            'indirizzo' => 'required|string',
            'citta' => 'required|string',
            'cap' => 'required|numeric',
            'telefono' =>'numeric',
            'descrizione' => 'required|string|max:2500',           
        ];
    }

}