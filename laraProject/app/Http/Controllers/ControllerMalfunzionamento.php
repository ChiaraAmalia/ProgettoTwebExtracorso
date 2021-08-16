<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;

use App\Models\Resources\Malfunzionamento;
use App\Http\Requests\AggiornamentoMalfunzionamentoRequest;

/**
 * Description of ControllerMalfunzionamento
 *
 * @author chiar
 */
class ControllerMalfunzionamento extends Controller{
    
    public function formModificaMalfunzionamento($codice_malfunzionamento) {
        $malfunzionamento = Malfunzionamento::find($codice_malfunzionamento);
        return view('ModificaMalfunzionamento', ['malfunzionamento' => $malfunzionamento]);
    }
    
    public function update(AggiornamentoMalfunzionamentoRequest $request, $codice_malfunzionamento) {

        $malfunzionamento= Malfunzionamento::find($codice_malfunzionamento);
        $malfunzionamento->fill($request->validated());
        $malfunzionamento->titolo = $request->titolo;
        $malfunzionamento->descrizione = $request->descrizione;
        $malfunzionamento->save();

        return redirect('catalogo');
    }
}
