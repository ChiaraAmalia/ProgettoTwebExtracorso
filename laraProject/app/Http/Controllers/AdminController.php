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
use App\Http\Requests\NuovoProdottoRequest;
use App\Http\Requests\NuovoTecnicoRequest;
use App\Http\Requests\NuovoStaffRequest;
use App\Http\Requests\NuovoMalfunzionamentoRequest;
use App\Http\Requests\NuovoInterventoRequest;
use App\Http\Requests\NuovoCentroEsternoRequest;
use App\Http\Requests\AggiornamentoCentriEsterniRequest;
use App\Http\Requests\NuovaFaqRequest;


class AdminController extends Controller {

    protected $_adminModel;
    protected $_utenteModel;
    protected $_faqModel;
    protected $_malfunzionamentiModel;
    protected $_interventiModel;
    protected $_centriAssistenzaModel;

    public function __construct() {
        $this->middleware('can:isAdmin');
        $this->_utenteModel = new Utente;
        $this->_faqModel = new FAQ;
        $this->_malfunzionamentiModel = new Malfunzionamento;
        $this->_interventiModel = new Intervento;
        $this->_centriAssistenzaModel = new CentroAssistenza;
    }

    public function index() {
        return view('AreaAdmin');
    }

    public function AdminGestioneMalfunzionamenti($id,$codice_prodotto) {
        $prodotto = Prodotto::find($codice_prodotto);
        $malfunzionamenti = $this->_malfunzionamentiModel->getMalfunzionamentiProdotto($codice_prodotto);
        return view('GestioneMalfunzionamenti')
                        ->with('malfunzionamenti', $malfunzionamenti)
                        ->with('prodotto', $prodotto);
    }
    
    public function AdminGestioneInterventi($id,$codice_prodotto,$codice_malfunzionamento) {
        $prodotto = Prodotto::find($codice_prodotto);
        $interventi = $this->_interventiModel->getInterventiMalfunzionamento($codice_malfunzionamento);
        $malfunzionamento = $this->_malfunzionamentiModel->getMalfunzionamentoByCodice($codice_malfunzionamento);
        return view('GestioneInterventi')
                        ->with('interventi', $interventi)
                        ->with('malfunzionamento', $malfunzionamento)
                        ->with('prodotto', $prodotto);
    }
    
    public function mostraFormInserimentoProdotto() {
        return view('InserimentoProdotto');
    }
    
    public function inserisci(NuovoProdottoRequest $request) {
        if ($request->hasFile('immagine')) {
            $image = $request->file('immagine');
            $imageName = $image->getClientOriginalName();
        } else {
            $imageName = NULL;
        }

        $prodotto = new Prodotto;
        $prodotto->fill($request->validated());
        $prodotto->nome_prodotto = $request->nome_prodotto;
        $prodotto->immagine = $imageName;
        $prodotto->tipologia = $request->tipologia;
        $prodotto->rumore = $request->rumore;
        $prodotto->consumo_en_annuo = $request->consumo_en_annuo;
        $prodotto->luce_interna = $request->luce_interna;
        $prodotto->programmi = $request->programmi;
        $prodotto->classe_energetica = $request->classe_energetica;
        $prodotto->descrizione = $request->descrizione;
        $prodotto->tecniche_buonuso = $request->tecniche_buonuso;
        $prodotto->modalita_installazione = $request->modalita_installazione;
        $prodotto->save();

        if (!is_null($imageName)) {
            $destinationPath = public_path() . '/images/locandine';
            $image->move($destinationPath, $imageName);
        }

        return response()->json(['redirect' => route('catalogo')]);
    }
    
    public function formModificaProdotto($codice_prodotto) {
        $prodotto = Prodotto::find($codice_prodotto);
        return view('ModificaProdotto', ['prodotto' => $prodotto]);
    }
    
    
    public function eliminaProdotto($id) {
        Prodotto::find($id)->delete();
        return redirect('catalogo');
    }
    
    public function formInserisciMalfunzionamentoAdmin($id,$codice_prodotto) {
        
        $prodotto = Prodotto::find($codice_prodotto);
        return view('InserimentoMalfunzionamento', ['prodotto' => $prodotto]);
    }
    
    public function inserisciMalfunzionamentoAdmin(NuovoMalfunzionamentoRequest $request,$id,$codice_prodotto) {

        $malfunzionamento= new Malfunzionamento;
        $malfunzionamento->fill($request->validated());
        $malfunzionamento->codice_prodotto = $codice_prodotto;
        $malfunzionamento->titolo = $request->titolo;
        $malfunzionamento->descrizione = $request->descrizione;
        $malfunzionamento->save();

        return redirect('catalogo');
    }
    
    public function formInserisciInterventoAdmin($id,$codice_prodotto,$codice_malfunzionamento) {
        
        $prodotto = Prodotto::find($codice_prodotto);
        $malfunzionamento = Malfunzionamento::find($codice_malfunzionamento);
        return view('InserimentoIntervento', ['prodotto' => $prodotto , 'malfunzionamento'=>$malfunzionamento]);
    }
    
    public function inserisciInterventoAdmin(NuovoInterventoRequest $request,$id,$codice_prodotto,$codice_malfunzionamento) {

        $intervento= new Intervento;
        $intervento->fill($request->validated());
        $intervento->codice_malfunzionamento = $codice_malfunzionamento;
        $intervento->descrizione = $request->descrizione;
        $intervento->save();

        return redirect('catalogo');
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

    public function vediUtenti(){
        $utenti=Utente::all();
        $centri = CentroAssistenza::all();
        $tecniciInterni=[];
        $tecniciEsterni=[];
        $staff=[];
        $centriEsterni=[];
        $centriInterni=[];
        foreach ($utenti as $utente){
            if ($utente->categoria=='staff'){
                array_push($staff,$utente);
            }else if ($utente->categoria=='tecnico' and $utente->occupazione=='interna'){
                array_push($tecniciInterni,$utente);
            }else if ($utente->categoria=='tecnico' and $utente->occupazione=='esterna'){
                array_push($tecniciEsterni,$utente);
            }
        }
        foreach ($centri as $centro){
            if ($centro->tipologia=='esterna'){
                array_push($centriEsterni,$centro);
            }else if($centro->tipologia=='interna'){
                array_push($centriInterni,$centro);
            }     
        }
            
        return view('gestioneUtenti', ['staff' => $staff,
                                    'tecniciInterni'=>$tecniciInterni,
                                    'tecniciEsterni'=>$tecniciEsterni,
                                    'centriEsterni'=>$centriEsterni,
                                    'centriInterni'=>$centriInterni]);
    }
    
    public function cancella($id) {
        
        Utente::find($id)->delete();
        return redirect('gestioneUtenti');
    }
    
    public function formAggiungiTecnicoInterno(){
        
        $filtro_codice = $this->_centriAssistenzaModel->getCentriAssistenzaInterni()->pluck('codice_centro','codice_centro');
        return view('RegistrazioneTecnicoInterno')
                    ->with('filtro_codice', $filtro_codice);
    }
    
    public function aggiungiTecnicoInterno(NuovoTecnicoRequest $request) {
        
        $tecnico = new Utente;
        $tecnico->fill($request->validated());
        $centro = CentroAssistenza::where('codice_centro', '=', $request->codice_centro)->value('nome_centro');
        $tecnico->codice_centro = $request->codice_centro;
        $tecnico->username=$request->username;
        $tecnico->password=Hash::make($request->password);
        $tecnico->categoria='tecnico';
        $tecnico->specializzazione = NULL;
        $tecnico->occupazione = 'interna';
        $tecnico->nome_centro = $centro;
        $tecnico->email=$request->email;
        $tecnico->nome=$request->nome;
        $tecnico->cognome=$request->cognome;
        $tecnico->via=$request->via;
        $tecnico->citta=$request->citta;
        $tecnico->cap=$request->cap;
        $tecnico->sesso=$request->sesso;
        $tecnico->cellulare=$request->cellulare;
        $tecnico->save();

        return redirect('gestioneUtenti');
    }
    
    public function formAggiungiCentroEsterno(){

        return view('AggiuntaCentroEsterno');
                    
    }
    
    public function aggiungiCentroEsterno(NuovoCentroEsternoRequest $request) {
        
        $centro = new CentroAssistenza;
        $centro->fill($request->validated());
        $centro->tipologia='esterna';
        $centro->nome_centro = $request->nome_centro;
        $centro->indirizzo=$request->indirizzo;
        $centro->citta=$request->citta;
        $centro->cap=$request->cap;
        $centro->telefono=$request->telefono;
        $centro->descrizione=$request->descrizione;
        $centro->save();

        return redirect('gestioneUtenti');
    }
    
    public function formModificaCentroEsterno($codice_centro) {
        $centro = CentroAssistenza::find($codice_centro);
        return view('ModificaCentroEsterno', ['centro' => $centro]);
    }
    
    public function update(AggiornamentoCentriEsterniRequest $request, $codice_centro){
        $centro = CentroAssistenza::find($codice_centro);
        $esterni = $this->_utenteModel->getTecnici();
        $centro->fill($request->validated());
        $centro->nome_centro = $request->nome_centro;
        
        foreach($esterni as $testerno){
            if($testerno->codice_centro == $codice_centro){
                $testerno->nome_centro = $centro->nome_centro;
                $testerno->save();
            }
        }
        $centro->indirizzo=$request->indirizzo;
        $centro->citta=$request->citta;
        $centro->cap=$request->cap;
        $centro->telefono=$request->telefono;
        $centro->descrizione=$request->descrizione;
        $centro->save();

        return redirect('gestioneUtenti');
    }
    
    public function eliminaCentro($codice_centro) {       
          
        Utente::where('codice_centro', '=', $codice_centro)->delete();
        CentroAssistenza::find($codice_centro)->delete();
        return redirect('gestioneUtenti');
    }
    
    public function formAggiungiTecnicoEsterno(){
        
        $filtro_codice = $this->_centriAssistenzaModel->getCentriAssistenzaEsterni()->pluck('codice_centro','codice_centro');
        return view('RegistrazioneTecnicoEsterno')
                    ->with('filtro_codice', $filtro_codice);
    }
    
    public function aggiungiTecnicoEsterno(NuovoTecnicoRequest $request) {
        
        $tecnico = new Utente;
        $tecnico->fill($request->validated());
        $centro = CentroAssistenza::where('codice_centro', '=', $request->codice_centro)->value('nome_centro');
        $tecnico->codice_centro = $request->codice_centro;
        $tecnico->username=$request->username;
        $tecnico->password=Hash::make($request->password);
        $tecnico->categoria='tecnico';
        $tecnico->specializzazione = NULL;
        $tecnico->occupazione = 'esterna';
        $tecnico->nome_centro = $centro;
        $tecnico->email=$request->email;
        $tecnico->nome=$request->nome;
        $tecnico->cognome=$request->cognome;
        $tecnico->via=$request->via;
        $tecnico->citta=$request->citta;
        $tecnico->cap=$request->cap;
        $tecnico->sesso=$request->sesso;
        $tecnico->cellulare=$request->cellulare;
        $tecnico->save();

        return redirect('gestioneUtenti');
    }
    
    public function formAggiungiStaff(){

        return view('RegistrazioneStaff');
                    
    }
    
    public function aggiungiStaff(NuovoStaffRequest $request) {
        
        $staff = new Utente;
        $staff->fill($request->validated());
        $staff->codice_centro = NULL;
        $staff->username=$request->username;
        $staff->password=Hash::make($request->password);
        $staff->categoria='staff';
        $staff->specializzazione = $request->specializzazione;
        $staff->occupazione = NULL;
        $staff->nome_centro = NULL;
        $staff->email=$request->email;
        $staff->nome=$request->nome;
        $staff->cognome=$request->cognome;
        $staff->via=$request->via;
        $staff->citta=$request->citta;
        $staff->cap=$request->cap;
        $staff->sesso=$request->sesso;
        $staff->cellulare=$request->cellulare;
        $staff->save();

        return redirect('gestioneUtenti');
    }

    
}
