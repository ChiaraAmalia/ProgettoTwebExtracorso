<?php

namespace App\Models\Resources;

use Illuminate\Database\Eloquent\Model;

class FAQ extends Model{
    
    protected $table = 'faq';
    protected $primaryKey = 'id_faq';
    public $timestamps = false;
    protected $fillable = ['domanda','risposta'];
    
    public function getfaq() {
         
         return FAQ::all();
    }
}
