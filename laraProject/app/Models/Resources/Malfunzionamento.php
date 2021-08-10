<?php

namespace App\Models\Resources;
use Illuminate\Database\Eloquent\Model;

/**
 * Description of Malfunzionamento
 *
 * @author chiar
 */
class Malfunzionamento extends Model{
    
    protected $table = 'malfunzionamento';
    protected $primaryKey = 'codice_malfunzionamento';
    public $timestamps = false;
    protected $guarded = ['codice_malfunzionamento'];
    protected $fillable = ['titolo', 'descrizione'];
    
    // Realazione One-To-One con Prodotto
    public function codProdotto() {
        return $this->hasOne(Prodotto::class, 'codice_prodotto', 'codice_prodotto');
    }
    
    public function getMalfunzionamentiProdotto($codice_prodotto){
         $malfunzionamenti=Malfunzionamento::where('codice_prodotto',$codice_prodotto)->get();
         return $malfunzionamenti->all();
    }
    
    public function getMalfunzionamentoByCodice($codice_malfunzionamento) {
        return Malfunzionamento::where('codice_malfunzionamento', $codice_malfunzionamento)->first();
    }
}
