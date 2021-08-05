<?php

namespace App\Models\Resources;

use Illuminate\Database\Eloquent\Model;
/**
 * Description of Prodotto
 *
 * @author chiar
 */
class Prodotto extends Model{
    
    protected $table = 'prodotto';
    protected $primaryKey = 'codice_prodotto';
    public $timestamps = false;
    protected $guarded = ['codice_prodotto'];
    protected $fillable = [
		'nome_prodotto', 'tipologia','rumore', 'consumo',
                'luce_interna','programmi','classe_energetica','descrizione'];
}
