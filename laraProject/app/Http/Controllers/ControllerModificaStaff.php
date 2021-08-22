<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;
use App\Models\Resources\Utente;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\AggiornamentoStaffRequest;

/**
 * Description of ControllerModificaStaff
 *
 * @author chiar
 */
class ControllerModificaStaff extends Controller{
    
    
    public function update(AggiornamentoStaffRequest $request, $id) {
        
        $ut= Utente::find($id);
        $ut->fill($request->validated());
        $ut->specializzazione = $request->specializzazione;
        $ut->email=$request->email;
        $ut->nome = $request->nome;
        $ut->cognome=$request->cognome;
        $ut->password=Hash::make($request->password);
        $ut->sesso=$request->sesso;
        $ut->citta=$request->citta;
        $ut->via=$request->via;
        $ut->cap=$request->cap;
        $ut->cellulare=$request->cellulare;
        $ut->save();

        return redirect('gestioneUtenti');
    }
}
