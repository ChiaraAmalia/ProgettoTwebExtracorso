<?php

namespace App\Http\Controllers;
use App\Models\Resources\Utente;
use App\Models\Resources\Prodotto;
use App\Models\Catalogo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;




class ControllerLivello2 extends Controller {

    protected $_catalogoModel;
    protected $_utenteModel;
    protected $prodottoModel;


    public function __construct() {
        $this->middleware('can:isTecnico');
        $this->_utenteModel = new Utente;
        $this->_catalogoModel = new Catalogo;
        $this->_prodottoModel = new Prodotto;  
    }
    
    public function index() {
        return view('AreaUtente2');
    }
   
}

