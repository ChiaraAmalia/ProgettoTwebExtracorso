<?php

namespace App\Models;

use App\Models\Resources\Evento;

class Catalogo {

    public function getTabellaEventi() {

        return Evento::all();
    }

    public function getTuttiEventi() {

        return Evento::paginate(4);
    }

    public function getEventoByCodice($codice_evento) {

        return Evento::where('codice_evento', $codice_evento)->first();
    }

    

    public function getEventiFiltrati($luogo = null, $societa = null, $data = null, $descrizione = null) {
        if ($data != '01-0000') {
            return Evento::where('informazioni', 'LIKE', '%' . $descrizione . '%')
                            ->where('luogo', 'LIKE', '%' . $luogo . '%')
                            ->where('societa_organizzatrice', 'LIKE', '%' . $societa . '%')
                            ->whereYear('data_ora', substr($data, 3, 7))
                            ->whereMonth('data_ora', substr($data, 0, 2))
                            ->get();
        }
        return Evento::where('informazioni', 'LIKE', '%' . $descrizione . '%')
                        ->where('luogo', 'LIKE', '%' . $luogo . '%')
                        ->where('societa_organizzatrice', 'LIKE', '%' . $societa . '%')
                        ->get();
        
    }

    public function getEventoConFiltri($descr = null, $luogo = null, $data = null) {
        
        return Evento::where('luogo', $luogo)->first();
    }

    
}
