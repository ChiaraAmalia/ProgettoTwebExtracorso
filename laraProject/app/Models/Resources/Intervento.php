<?php

namespace App\Models\Resources;
use Illuminate\Database\Eloquent\Model;

/**
 * Description of Intervento
 *
 * @author chiar
 */
class Intervento extends Model{
    
    protected $table = 'intervento';
    protected $primaryKey = 'codice_intervento';
    public $timestamps = false;
    protected $guarded = ['codice_intervento'];
    protected $fillable = ['descrizione'];
    
    // Realazione One-To-One con Prodotto
    public function codMalfunzionamento() {
        return $this->hasOne(Malfunzionamento::class, 'codice_malfunzionamento', 'codice_malfunzionamento');
    }
    
    public function getInterventiMalfunzionamento($codice_malfunzionamento){
         $interventi=Intervento::where('codice_malfunzionamento',$codice_malfunzionamento)->get();
         return $interventi->all();
    }
}
