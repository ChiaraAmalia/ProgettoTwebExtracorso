<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

/**
 * Description of AggiornamentoTecnicoRequest
 *
 * @author chiar
 */
class AggiornamentoStaffRequest extends FormRequest {
    
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
            'specializzazione'=>'required',
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:8|confirmed',
            'via' => 'required|string',
            'citta' => 'required|string',
            'cap' => 'required|numeric',
            'cellulare' =>'numeric',
            'sesso' => 'required|string',           
        ];
    }
}