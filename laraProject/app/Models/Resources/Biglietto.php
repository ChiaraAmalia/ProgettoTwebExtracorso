<?php

namespace App\Models\Resources;

use Illuminate\Database\Eloquent\Model;

class Biglietto extends Model{
    
    protected $table = 'biglietto';
    protected $primaryKey = 'codice_biglietto';
    public $timestamps = false;
    protected $fillable = ['metodo_pagamento'];
    
    // Realazione One-To-One con Utente
    public function codUtente() {
        return $this->hasOne(Utente::class, 'id', 'id');
    }
    
    // Realazione One-To-One con Evento
    public function codEvento() {
        return $this->hasOne(Evento::class, 'codice_evento', 'codice_evento');
    }
    
    public function getBigliettiUtente($id){
         $biglietti=Biglietto::where('id',$id)->get();
         return $biglietti->all();
    }
}
