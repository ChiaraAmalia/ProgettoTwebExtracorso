<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Resources\Utente;
use App\Models\Resources\Prodotto;
use App\Models\Resources\Malfunzionamento;
use App\Models\Resources\Intervento;
use App\Models\Resources\CentroAssistenza;
use App\Models\Resources\FAQ;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\NuovoOrganizzatoreRequest;
use App\Http\Requests\AggiornamentoOrganizzatoreRequest;
use App\Http\Requests\NuovaFaqRequest;


class AdminController extends Controller {

    protected $_adminModel;
    protected $_utenteModel;
    protected $_faqModel;
    protected $_malfunzionamentiModel;
    protected $_interventiModel;

    public function __construct() {
        $this->middleware('can:isAdmin');
        $this->_utenteModel = new Utente;
        $this->_faqModel = new FAQ;
        $this->_malfunzionamentiModel = new Malfunzionamento;
        $this->_interventiModel = new Intervento;
    }

    public function index() {
        return view('AreaAdmin');
    }

    public function AdminGestioneMalfunzionamenti($id,$codice_prodotto) {
        $malfunzionamenti = $this->_malfunzionamentiModel->getMalfunzionamentiProdotto($codice_prodotto);
        return view('GestioneMalfunzionamenti')
                        ->with('malfunzionamenti', $malfunzionamenti);
    }
    
    public function AdminGestioneInterventi($id,$codice_prodotto,$codice_malfunzionamento) {
        $interventi = $this->_interventiModel->getInterventiMalfunzionamento($codice_malfunzionamento);
        $malfunzionamento = $this->_malfunzionamentiModel->getMalfunzionamentoByCodice($codice_malfunzionamento);
        return view('GestioneInterventi')
                        ->with('interventi', $interventi)
                        ->with('malfunzionamento', $malfunzionamento);
    }
    
    public function eliminaMalfunzionamento($id,$codice_prodotto,$codice_malfunzionamento){
        
        Malfunzionamento::find($codice_malfunzionamento)->delete();
        return redirect('admin');
    }
    
    public function eliminaIntervento($id,$codice_prodotto,$codice_malfunzionamento,$codice_intervento){
        
        Intervento::find($codice_intervento)->delete();        
        return redirect('admin');
    }
    
    public function mostrafaq() {

        //Prende tutte le FAQ
        $faq = $this->_faqModel->getfaq();
        return view('gestioneFAQ')
                        ->with('faq', $faq);
    }
    
    public function cancellafaq($id) {
        FAQ::find($id)->delete();
        return redirect('gestioneFAQ');
    }
    
    public function aggiungifaq(NuovaFaqRequest $request) {
        $faq = new FAQ;
        $faq->fill($request->validated());
        $faq->domanda=$request->domanda;
        $faq->risposta=$request->risposta;
        $faq->save();

        return redirect('gestioneFAQ');
    }
    
    public function FormFAQ($id) {
        $faq= FAQ::find($id);
        return view('ModificaFaq', ['faq' => $faq]);
    }
    
    public function eliminaProdotto($id) {
        Prodotto::find($id)->delete();
        return redirect('catalogo');
    }

    public function vediUtenti(){
        $utenti=Utente::all();
        $centri = CentroAssistenza::all();
        $tecniciInterni=[];
        $tecniciEsterni=[];
        $staff=[];
        $centriEsterni=[];
        foreach ($utenti as $utente){
            if ($utente->categoria=='staff'){
                array_push($staff,$utente);
            }else if ($utente->categoria=='tecnico' and $utente->occupazione=='interna'){
                array_push($tecniciInterni,$utente);
            }else if ($utente->categoria=='tecnico' and $utente->occupazione=='interna'){
                array_push($tecniciEsterni,$utente);
            }
        }
        foreach ($centri as $centro){
            if ($centro->tipologia=='esterna'){
                array_push($centriEsterni,$centro);
            }    
        }
            
        return view('gestioneUtenti', ['staff' => $staff,
                                    'tecniciInterni'=>$tecniciInterni,
                                    'tecniciEsterni'=>$tecniciEsterni,
                                    'centriEsterni'=>$centriEsterni]);
    }
    
    public function aggiungiOrganizzatore(NuovoOrganizzatoreRequest $request) {
        
        $organizzatore = new Utente;
        $organizzatore->fill($request->validated());
        $organizzatore->categoria='organizzatore';
        $organizzatore->nome=$request->nome;
        $organizzatore->cognome=$request->cognome;
        $organizzatore->email=$request->email;
        $organizzatore->username=$request->username;
        $organizzatore->password=Hash::make($request->password);
        $organizzatore->via=$request->via;
        $organizzatore->citta=$request->citta;
        $organizzatore->cap=$request->cap;
        $organizzatore->cellulare=$request->cellulare;
        $organizzatore->nome_societa_organizzatrice=$request->nome_societa_organizzatrice;
        $organizzatore->sesso=$request->sesso;
        $organizzatore->save();

        return redirect('/');
    }
    
    public function update(AggiornamentoOrganizzatoreRequest $request, $id)
{      
        $organizzatore= Utente::find($id);
        $organizzatore->fill($request->validated());
        $organizzatore->categoria='organizzatore';
        $organizzatore->nome=$request->nome;
        $organizzatore->cognome=$request->cognome;
        $organizzatore->email=$request->email;
        $organizzatore->username=$request->username;
        $organizzatore->via=$request->via;
        $organizzatore->citta=$request->citta;
        $organizzatore->cap=$request->cap;
        $organizzatore->cellulare=$request->cellulare;
        $organizzatore->nome_societa_organizzatrice=$request->nome_societa_organizzatrice;
        $organizzatore->sesso=$request->sesso;
        $organizzatore->save();
  

    return redirect('gestioneUtenti');
}
public function FormOrganizzatori($id) {
    $organizzatore= Utente::find($id);
    return view('ModificaOrganizzatore', ['organizzatore' => $organizzatore]);
    
}

    public function cancella($id) {
        Utente::find($id)->delete();
        return redirect('gestioneUtenti');
    }
    
    public function statistiche($id) {
        $organizzatore=Utente::find($id);
        $tutti_eventi=Evento::all();
        $id_eventi=[];
        $tutti_biglietti=Biglietto::all();
        $biglietti=[];
        $incasso=0;
        $biglietti_totali=0;
        $biglietti_rimasti=0;
        $biglietti_venduti=0;
        $percentuale = 0;
        
        foreach ($tutti_eventi as $evento){
            if ($evento->societa_organizzatrice==$organizzatore->nome_societa_organizzatrice){
            array_push($id_eventi,$evento->codice_evento);
            $biglietti_totali=$biglietti_totali+$evento->totale_biglietti_evento;
            $biglietti_rimasti=$biglietti_rimasti+$evento->biglietti_rimanenti;
            }
        }
        foreach ($tutti_biglietti as $biglietto) {
            foreach ($id_eventi as $id){
                if($biglietto->codice_evento==$id){
                    array_push($biglietti,$biglietto);
                }
            }
        }
        foreach ($biglietti as $bigl){
            $incasso=$incasso+$bigl->prezzo_acquisto;
            $biglietti_venduti=$biglietti_venduti+$bigl->quantita;
        }
        
        if($biglietti_totali != 0){
            $percentuale = round((($biglietti_venduti*100)/$biglietti_totali),2);
        }
        
        $percent_bv=$percentuale;
       
        return view('Statistiche', ['organizzatore' => $organizzatore,
                                    'incasso'=>$incasso,
                                    'biglietti_venduti'=>$biglietti_venduti,
                                    'biglietti_totali'=>$biglietti_totali,
                                    'biglietti_rimasti'=>$biglietti_rimasti,
                                    'percent_bv'=>$percent_bv]); 
    }

}
