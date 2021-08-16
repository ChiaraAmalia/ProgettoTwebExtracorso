<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;

use App\Models\Resources\Prodotto;
use App\Http\Requests\AggiornamentoProdottoRequest;

/**
 * Description of ControllerProdotto
 *
 * @author chiar
 */
class ControllerProdotto extends Controller{
    
    public function update(AggiornamentoProdottoRequest $request, $codice_prodotto) {
        
        if ($request->hasFile('immagine')) {
            $image = $request->file('immagine');
            $imageName = $image->getClientOriginalName();
        } else {
            $imageName = NULL;
        }

        $prodotto= Prodotto::find($codice_prodotto);
        $prodotto->fill($request->validated());
        $prodotto->nome_prodotto = $request->nome_prodotto;
        $prodotto->immagine = $imageName;
        $prodotto->tipologia = $request->tipologia;
        $prodotto->rumore = $request->rumore;
        $prodotto->consumo_en_annuo = $request->consumo_en_annuo;
        $prodotto->luce_interna = $request->luce_interna;
        $prodotto->programmi = $request->programmi;
        $prodotto->classe_energetica = $request->classe_energetica;
        $prodotto->descrizione = $request->descrizione;
        $prodotto->tecniche_buonuso = $request->tecniche_buonuso;
        $prodotto->modalita_installazione = $request->modalita_installazione;
        $prodotto->save();

        if (!is_null($imageName)) {
            $destinationPath = public_path() . '/images/locandine';
            $image->move($destinationPath, $imageName);
        }
        return redirect('admin');
    }
}
