<?php

namespace App\Models\Resources;
use Illuminate\Database\Eloquent\Model;

/**
 * Description of CentroAssistenza
 *
 * @author chiar
 */
class CentroAssistenza extends Model{
    
    protected $table = 'centroAssistenza';
    protected $primaryKey = 'codice_centro';
    public $timestamps = false;
    protected $guarded = ['codice_centro'];
    protected $fillable = ['nome_centro','indirizzo','citta',
                           'cap','telefono','descrizione'];
    
    public function getCentriAssistenzaEsterni($codice_centro){
        
        $esterni = CentroAssistenza::where($codice_centro->$tipologia, '=', 'esterna');
        return $esterni->all();
    }
    
    public function getCentriAssistenza(){
        return CentroAssistenza::all();
    }
}
