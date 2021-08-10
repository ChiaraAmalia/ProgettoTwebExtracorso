<?php

namespace App\Http\Controllers;

use App\Models\Catalogo;
use App\Models\Resources\FAQ;
use App\Models\Resources\Malfunzionamento;
use App\Models\Resources\Intervento;
use App\Http\Requests\FiltroRequest;

class ControllerPubblico extends Controller {

    protected $_catalogoModel;
    protected $_faqModel;
    protected $_malfunzionamentiModel;
    protected $_interventiModel;

    public function __construct() {
        $this->_catalogoModel = new Catalogo;
        $this->_faqModel = new FAQ;
        $this->_malfunzionamentiModel = new Malfunzionamento;
        $this->_interventiModel = new Intervento;
    }

    public function mostraCatalogo() {

        //Mostra il catalogo con tutti i prodotti
        $prodotti = $this->_catalogoModel->getTuttiProdotti();
                return view('catalogo')
                        ->with('prodotti', $prodotti)->with('filtrato', 0);
    }

    
    public function mostraCatalogoFiltrato(FiltroRequest $request) {

        $descrizione = $request->get('ricerca');
        $prodotti = $this->_catalogoModel->getProdottiFiltrati($descrizione);
        $filtrato = 1;
        return view('catalogo')
                        ->with('prodotti', $prodotti)->with('filtrato', $filtrato);
    }

    public function mostrafaq() {

        //Prende tutte le FAQ
        $faq = $this->_faqModel->getfaq();


        return view('faq')
                        ->with('faq', $faq);
    }
 
    public function mostraDettagli($codice_prodotto) {

        //Mostra la finestra con i dettagli dell'evento selezionato
        $prodotto = $this->_catalogoModel->getProdottoByCodice($codice_prodotto);
        $malfunzionamenti = $this->_malfunzionamentiModel->getMalfunzionamentiProdotto($codice_prodotto);
        $nome_prodotto = $prodotto->nome_prodotto;
        $tipologia = $prodotto->tipologia;
        $rumore = $prodotto->rumore;
        $consumo_en_annuo = $prodotto->consumo_en_annuo;
        $descrizione = $prodotto->descrizione;
        $luce_interna = $prodotto->luce_interna;
        $programmi = $prodotto->programmi;
        $classe_energetica = $prodotto->classe_energetica;
        $immagine = $prodotto->immagine;
        $tecniche_buonuso = $prodotto->tecniche_buonuso;
        $modalita_installazione = $prodotto->modalita_installazione;
               
        return view('dettagliProdotto', ['prodotto' => $prodotto,
            'nome_prodotto' => $nome_prodotto,
            'tipologia' => $tipologia,
            'rumore' => $rumore,
            'consumo_en_annuo' => $consumo_en_annuo,
            'descrizione' => $descrizione,
            'luce_interna' => $luce_interna,
            'programmi' => $programmi,
            'classe_energetica' => $classe_energetica,
            'immagine' => $immagine,
            'tecniche_buonuso' => $tecniche_buonuso,
            'modalita_installazione' => $modalita_installazione,
            'malfunzionamenti' => $malfunzionamenti   
        ]);
    }
    
    public function mostraMalfunzionamenti($codiceProdotto,$codice_malfunzionamento){
        $malfunzionamento = $this->_malfunzionamentiModel->getMalfunzionamentoByCodice($codice_malfunzionamento);
        $interventi = $this->_interventiModel->getInterventiMalfunzionamento($codice_malfunzionamento);
        $titolo = $malfunzionamento->titolo;
        $descrizione = $malfunzionamento->descrizione;
        
        return view('dettagliMalfunzionamento', ['malfunzionamento' => $malfunzionamento,
            'titolo' => $titolo,
            'descrizione' => $descrizione,
            'interventi' => $interventi
        ]);
    }

}
