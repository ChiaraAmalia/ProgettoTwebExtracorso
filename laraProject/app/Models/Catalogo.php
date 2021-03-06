<?php

namespace App\Models;

use App\Models\Resources\Prodotto;

class Catalogo {

    public function getTabellaProdotti() {

        return Prodotto::all();
    }

    public function getTuttiProdotti() {

        return Prodotto::paginate(4);
    }

    public function getProdottoByCodice($codice_prodotto) {

        return Prodotto::where('codice_prodotto', $codice_prodotto)->first();
    }
    
    public function getProdottiFiltrati($descrizione = null) {
        
        $nasterisco = substr_count($descrizione, '*');
        if($nasterisco == 1){
            if(substr_compare($descrizione, '*', -strlen('*')) === 0){
                $asterisco = str_replace("*", "",$descrizione);
                return Prodotto::where('descrizione', 'LIKE', '%' . $asterisco . '%')->get();
            }
        }
        else if($nasterisco == 0){
            return Prodotto::where('descrizione', $descrizione)->get(); 
        }
    }

    
}
