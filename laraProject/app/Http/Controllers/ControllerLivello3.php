<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Resources\Utente;
use App\Models\Resources\Biglietto;
use App\Models\Resources\Evento;
use App\Models\Resources\Partecipero;
use App\Models\Resources\GestioneEvento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\AggiornamentoEventoRequest;
use App\Http\Requests\NuovoEventoRequest;
use Carbon\Carbon;

class ControllerLivello3 extends Controller {

    protected $_gestioneEventoModel;
    protected $_utenteModel;

    public function __construct() {

        $this->middleware('can:isOrganizer');
        $this->_gestioneEventoModel = new GestioneEvento;
        $this->_utenteModel = new Utente;
    }
    
        public function index() {
        return view('AreaOrganizzatore');
    }
    
    public function mostraGestioneEventi($id) {
        $utente = $this->_utenteModel->getUtenteById($id);
        $societa = $utente->pluck('nome_societa_organizzatrice');
        $eventi = $this->_gestioneEventoModel->getEventiBySocieta($societa[0]);
        return view('GestioneEventi')
                        ->with('eventi', $eventi);
    }

    public function mostraFormInserimento() {
        return view('InserimentoEvento');
    }

    
    public function inserisciEvento(NuovoEventoRequest $request) {
        if ($request->hasFile('locandina')) {
            $image = $request->file('locandina');
            $imageName = $image->getClientOriginalName();
        } else {
            $imageName = NULL;
        }

        $nuovoEvento = new Evento;
        $nuovoEvento->fill($request->validated());
        $nuovoEvento->locandina = $imageName;
        $nuovoEvento->societa_organizzatrice = $request->societa_organizzatrice;
        $nuovoEvento->prezzo_biglietto = $request->prezzo_biglietto;
        $nuovoEvento->biglietto_scontato = 0;
        $nuovoEvento->sconto = $request->sconto;
        $dateTimeString = $request->data . " " . $request->ora;
        $dueDateTime = Carbon::createFromFormat('Y-m-d H:i', $dateTimeString);
        $nuovoEvento->data_ora = $dueDateTime;
        $nuovoEvento->informazioni = $request->informazioni;
        $nuovoEvento->titolo = $request->titolo;
        $nuovoEvento->totale_biglietti_evento = $request->totale_biglietti_evento;
        $nuovoEvento->biglietti_rimanenti = $request->totale_biglietti_evento;
        $nuovoEvento->coordinate_maps = $request->coordinate_maps;
        $nuovoEvento->luogo = $request->luogo;
        $nuovoEvento->programma_evento = $request->programma_evento;
        $nuovoEvento->indicazioni = $request->indicazioni;
        $nuovoEvento->save();

        if (!is_null($imageName)) {
            $destinationPath = public_path() . '/images/locandine';
            $image->move($destinationPath, $imageName);
        }

        return response()->json(['redirect' => route('organizzatore')]);
    }

    public function eliminaEvento($id) {
        Evento::find($id)->delete();
        Partecipero::where('codice_evento', '=', $id)->delete();
        return redirect('organizzatore');
    }

    public function modificaEvento($id) {
        $evento = Evento::find($id);
        return view('ModificaEvento', ['evento' => $evento]);
    }

    public function update(AggiornamentoEventoRequest $request, $id) {
        
        if ($request->hasFile('locandina')) {
            $image = $request->file('locandina');
            $imageName = $image->getClientOriginalName();
        } else {
            $imageName = NULL;
        }

        $nuovoEvento= Evento::find($id);
        $nuovoEvento->fill($request->validated());
        $nuovoEvento->locandina = $imageName;
        $nuovoEvento->societa_organizzatrice = $request->societa_organizzatrice;
        $nuovoEvento->prezzo_biglietto = $request->prezzo_biglietto;
        $nuovoEvento->biglietto_scontato = 0;
        $nuovoEvento->sconto = $request->sconto;
        
        $nuovoEvento->data_ora = Carbon::create($request->data_ora);
        $nuovoEvento->informazioni = $request->informazioni;
        $nuovoEvento->titolo = $request->titolo;
        $nuovoEvento->totale_biglietti_evento = $request->totale_biglietti_evento;
        $nuovoEvento->biglietti_rimanenti = $request->totale_biglietti_evento;
        $nuovoEvento->coordinate_maps = $request->coordinate_maps;
        $nuovoEvento->luogo = $request->luogo;
        $nuovoEvento->programma_evento = $request->programma_evento;
        $nuovoEvento->indicazioni = $request->indicazioni;
        $nuovoEvento->save();

        if (!is_null($imageName)) {
            $destinationPath = public_path() . '/images/locandine';
            $image->move($destinationPath, $imageName);
        }
        return redirect('organizzatore');
    }
    
    public function statistiche($codice_evento) {
        
        $biglietti_evento=Biglietto::where('codice_evento','=',$codice_evento)->get();
        $evento=Evento::find($codice_evento);
        $biglietti_tot=$evento->totale_biglietti_evento;
        $statistica=[
            'nomeEvento'=>$evento->titolo,
            'numBigl'=>0,
            'pv'=>0,
            'incasso'=>0
        ];
        
        
        foreach ($biglietti_evento as $biglietto){
            $statistica['numBigl']+=$biglietto->quantita;
            $statistica['incasso']+=$biglietto->prezzo_acquisto;
        }
        
        $statistica['pv']=round((($statistica['numBigl']*100)/$biglietti_tot),2);
       
        return view('statisticheOrganizzatore')
                                ->with('statistica', $statistica); 
    }

}
