<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AggiornamentoProdottoRequest extends FormRequest {

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
            'nome_prodotto' => 'required|string',
            'tipologia' => 'required|string',
            'rumore' => 'required|string',
            'consumo_en_annuo' => 'required|string',
            'luce_interna' => 'required|string',
            'programmi' => 'required|string|max:2500',
            'classe_energetica' => 'required|string',
            'descrizione' => 'required|string|max:2500',
            'tecniche_buonuso' => 'required|string|max:2500',
            'modalita_installazione' => 'required|string|max:2500'
        ];
    }

}

