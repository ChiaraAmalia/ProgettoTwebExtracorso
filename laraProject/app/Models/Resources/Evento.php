<?php

namespace App\Models\Resources;

use Illuminate\Database\Eloquent\Model;
use Timestamp;

class Evento extends Model{
    
    protected $table = 'evento';
    protected $primaryKey = 'codice_evento';
    public $timestamps = false;
    protected $guarded = ['codice_evento'];
    protected $fillable = [
		'titolo', 'societa_organizzatrice','prezzo_biglietto', 'sconto',
                'data_ora','informazioni','titolo','totale_biglietti_evento','biglietti_rimanenti',
                'coordinate_maps','luogo','stato_evento','locandina','programma_evento',
                'indicazioni',
	];
    
    //trova il prezzo in caso ci sia lo sconto lo applica
    public function getPrezzo($conSconto = false) {
        $prezzo = $this->prezzo_biglietto;
        if (true == ($this->biglietto_scontato) && true == $conSconto) {
            $sconto = ($prezzo * $this->sconto) / 100;
            $prezzo = round($prezzo - $sconto, 2);
        }
        return $prezzo;
    }
    
    
}
