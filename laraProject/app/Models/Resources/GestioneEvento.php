<?php

namespace App\Models\Resources;

use Illuminate\Database\Eloquent\Model;

class GestioneEvento extends Model {

    public function getEventiBySocieta($societa) {
        
        return Evento::where('societa_organizzatrice', $societa)
                        ->paginate(4);
    }

}
