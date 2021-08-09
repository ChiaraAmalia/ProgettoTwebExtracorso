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
    
    /*

    public function acquisto($codice_evento) {

        //Mostra la finestra con i dettagli dell'evento selezionato
        $evento = $this->_catalogoModel->getEventoByCodice($codice_evento);
        $titolo = $evento->titolo;
        $prezzo = $evento->getPrezzo($evento->biglietto_scontato);
        $locandina = $evento->locandina;
        $biglietto_scontato = $evento->biglietto_scontato;
        $sconto = $evento->sconto;
        
        return view('acquisto',['titolo'=>$titolo,
                                                'evento'=>$evento,
                                                'biglietto_scontato'=>$biglietto_scontato,
                                                'sconto'=>$sconto,
                                                'prezzo'=>$prezzo,
                                                'locandina'=>$locandina
                                            ]);
    }
    
    
    public function update(Request $request, $id)
{
    $ut= Utente::find($id);
    $ut->nome = $request->nome;
    $ut->cognome=$request->cognome;
    $ut->email=$request->email;
    $ut->sesso=$request->sesso;
    $ut->citta=$request->citta;
    $ut->via=$request->via;
    $ut->cap=$request->cap;
    $ut->cellulare=$request->cellulare;
    $ut->save();

    return redirect('cliente');
}
    
    public function creaBiglietto(NuovoBigliettoRequest $request)
    {
        $evento=Evento::find($request->codice_evento);
        $evento->biglietti_rimanenti=($evento->biglietti_rimanenti)-($request->quantita);
        $evento->save();
        
        $biglietto=new Biglietto;
        $biglietto->fill($request->validated());
        $biglietto->id=$request->id;
        $biglietto->codice_evento=$request->codice_evento;
        if($evento->biglietto_scontato==1){
                    $prezzo=$evento->prezzo_biglietto-(($evento->prezzo_biglietto)*($evento->sconto)/100);         
                    $biglietto->prezzo_acquisto=($prezzo)*($request->quantita);          
         }
        else{
            $biglietto->prezzo_acquisto=($evento->prezzo_biglietto)*($request->quantita);  
        }
        $biglietto->quantita=$request->quantita;
        $biglietto->save();
        
        return redirect()->action('ControllerLivello2@mostraStorico', $request->id);
    }
    
    public function mostraStorico($id) {

        //Mostra lo storico con tutti gli eventi
        $biglietti = $this->_bigliettoModel->getBigliettiUtente($id);
        $eventi=[];
        foreach ($biglietti as $biglietto){
          $indice=$biglietto->codice_biglietto;
          $evento = $this->_catalogoModel->getEventoByCodice($biglietto->codice_evento); 
          $eventi[$indice]=$evento;
        }
       
        
    return view('StoricoUtente2', ['biglietti' => $biglietti,
                                    'eventi'=>$eventi]);
    }
    
    public function partecipero(Request $request){

        $partecip = Partecipero::firstOrCreate(['codice_utente' => $request->id,
                                                'codice_evento'=>$request->codice_evento]);  
        return redirect('catalogo');
    }
    
        
    
    public function vedipartecipero($id) {
        $partecip = Partecipero::where('codice_utente','=',$id)->get();
        $eventi=[];
          foreach ($partecip as $partecipero){
          $evento = Evento::find($partecipero->codice_evento); 
          array_push($eventi,$evento);
          
        }
            
        return view('partecipero', ['partecip' => $partecip,
                                            'eventi'=>$eventi]);
    }
     * 
     */
}

