<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

// Aggiunti per response JSON
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
use Symfony\Component\HttpFoundation\Response;

class NuovoEventoRequest extends FormRequest {

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
            'titolo' => 'required|max:40',
            'societa_organizzatrice' => 'required|max:40',
            'prezzo_biglietto' => 'required|numeric|min:0',
            'totale_biglietti_evento' => 'required|numeric|min:0',
            'coordinate_maps' => 'required|max:2500',
            'luogo' => 'required|max:100',
            'indicazioni' => 'required|max:2500',
            'programma_evento' => 'required|max:2500',
            'informazioni' => 'required|max:2500'
        ];
    }
    
        /**
     * Override: response in formato JSON
    */
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response($validator->errors(), Response::HTTP_UNPROCESSABLE_ENTITY));
    }

}
