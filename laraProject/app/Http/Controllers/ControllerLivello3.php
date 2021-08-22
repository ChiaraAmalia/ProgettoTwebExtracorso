<?php 

namespace App\Http\Controllers;

use App\Models\Resources\Utente;
use App\Models\Resources\Prodotto;
use App\Models\Resources\Malfunzionamento;
use App\Models\Resources\Intervento;
use App\Http\Requests\NuovoMalfunzionamentoRequest;
use App\Http\Requests\NuovoInterventoRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class ControllerLivello3 extends Controller {

    protected $_utenteModel;
    protected $prodottoModel;
    protected $_malfunzionamentiModel;
    protected $_interventiModel;

    public function __construct() {

        $this->middleware('can:isStaff');
        $this->_utenteModel = new Utente;
        $this->_prodottoModel = new Prodotto;
        $this->_malfunzionamentiModel = new Malfunzionamento;
        $this->_interventiModel = new Intervento;
    }
    
    public function index() {
        return view('AreaUtente3');
    }
   
    public function mostraGestioneProdotti($id) {
        $utente = $this->_utenteModel->getUtenteById($id);
        $specializzazione = $utente->pluck('specializzazione');
        $prodotti = $this->_prodottoModel->getProdottobySpecializzazione($specializzazione[0]);
        return view('GestioneProdotti')
                        ->with('prodotti', $prodotti);
    }
    
    public function mostraGestioneMalfunzionamenti($id,$codice_prodotto) {
        $prodotto = Prodotto::find($codice_prodotto);
        $malfunzionamenti = $this->_malfunzionamentiModel->getMalfunzionamentiProdotto($codice_prodotto);
        return view('GestioneMalfunzionamenti')
                        ->with('malfunzionamenti', $malfunzionamenti)
                        ->with('prodotto', $prodotto);
    }
    
    public function mostraGestioneInterventi($id,$codice_prodotto,$codice_malfunzionamento) {
        $prodotto = Prodotto::find($codice_prodotto);
        $interventi = $this->_interventiModel->getInterventiMalfunzionamento($codice_malfunzionamento);
        $malfunzionamento = $this->_malfunzionamentiModel->getMalfunzionamentoByCodice($codice_malfunzionamento);
        return view('GestioneInterventi')
                        ->with('interventi', $interventi)
                        ->with('malfunzionamento', $malfunzionamento)
                        ->with('prodotto', $prodotto);
    }
    
    public function formInserisciMalfunzionamento($id,$codice_prodotto) {
        
        $prodotto = Prodotto::find($codice_prodotto);
        return view('InserimentoMalfunzionamentoStaff', ['prodotto' => $prodotto]);
    }
    
    public function inserisciMalfunzionamento(NuovoMalfunzionamentoRequest $request,$id,$codice_prodotto) {

        $malfunzionamento= new Malfunzionamento;
        $malfunzionamento->fill($request->validated());
        $malfunzionamento->codice_prodotto = $codice_prodotto;
        $malfunzionamento->titolo = $request->titolo;
        $malfunzionamento->descrizione = $request->descrizione;
        $malfunzionamento->save();

        return redirect('catalogo');
    }
    
    public function eliminaMalfunzionamento($id,$codice_prodotto,$codice_malfunzionamento){
        
        Malfunzionamento::find($codice_malfunzionamento)->delete();
        return redirect('staff');
    }
    
    public function formInserisciIntervento($id,$codice_prodotto,$codice_malfunzionamento) {
        
        $prodotto = Prodotto::find($codice_prodotto);
        $malfunzionamento = Malfunzionamento::find($codice_malfunzionamento);
        return view('InserimentoInterventoStaff', ['prodotto' => $prodotto , 'malfunzionamento'=>$malfunzionamento]);
    }
    
    public function inserisciIntervento(NuovoInterventoRequest $request,$id,$codice_prodotto,$codice_malfunzionamento) {

        $intervento= new Intervento;
        $intervento->fill($request->validated());
        $intervento->codice_malfunzionamento = $codice_malfunzionamento;
        $intervento->descrizione = $request->descrizione;
        $intervento->save();

        return redirect('catalogo');
    }
    
    public function eliminaIntervento($id,$codice_prodotto,$codice_malfunzionamento,$codice_intervento){
        
        Intervento::find($codice_intervento)->delete();        
        return redirect('staff');
    }

}
