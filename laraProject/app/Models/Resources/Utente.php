<?php

namespace App\Models\Resources;

use Illuminate\Database\Eloquent\Model;

class Utente extends Model{
    
    protected $table = 'users';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $guarded = ['id'];
    protected $fillable = ['email','nome_centro','username','nome','cognome',
                           'password','via','citta','cap','sesso','cellulare'];
    
    public function getUtenteById($id) {
        return Utente::where('id', $id)->get();
    }
    
    public function getUtenti() {
        return Utente::all();      
    }
    
}
