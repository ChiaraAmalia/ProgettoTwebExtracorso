<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

// Aggiunti per response JSON
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
use Symfony\Component\HttpFoundation\Response;

class NuovoProdottoRequest extends FormRequest {

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
            'nome_prodotto' => 'required',
            'tipologia' => 'required',
            'rumore' => 'required',
            'consumo_en_annuo' => 'required',
            'luce_interna' => 'required',
            'programmi' => 'required|max:2500',
            'classe_energetica' => 'required',
            'descrizione' => 'required|max:2500',
            'tecniche_buonuso' => 'required|max:2500',
            'modalita_installazione' => 'required|max:2500'
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
