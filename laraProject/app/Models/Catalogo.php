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
        
        $asterisco = str_replace("*", "", $descrizione);
        return Prodotto::where('descrizione', 'LIKE', '%' . $asterisco . '%')
                        ->get();
        
    }

    
}
