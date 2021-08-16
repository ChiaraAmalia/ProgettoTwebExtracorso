<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;

use App\Models\Resources\Intervento;
use App\Http\Requests\AggiornamentoInterventoRequest;

/**
 * Description of ControllerMalfunzionamento
 *
 * @author chiar
 */
class ControllerIntervento {
    
    public function formModificaIntervento($codice_intervento) {
        $intervento = Intervento::find($codice_intervento);
        return view('ModificaIntervento', ['intervento' => $intervento]);
    }
    
    public function update(AggiornamentoInterventoRequest $request, $codice_intervento) {

        $intervento= Intervento::find($codice_intervento);
        $intervento->fill($request->validated());
        $intervento->descrizione = $request->descrizione;
        $intervento->save();

        return redirect('catalogo');
    }
}