<?php

/*
  |--------------------------------------------------------------------------
  | Web Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register web routes for your application. These
  | routes are loaded by the RouteServiceProvider within a group which
  | contains the "web" middleware group. Now create something great!
  |
 */

// ROTTE PUBBLICHE

//visualizzazione home pubblica

Route::view('/', 'homePubblica')
        ->name('homePubblica')
        ->middleware('preventBackHistory');

//visualizzazione faq

Route::get('/faq', 'ControllerPubblico@mostrafaq')
        ->name('faq')
        ->middleware('preventBackHistory');

//visualizzazione info

Route::get('/info', 'ControllerPubblico@mostraCentriAssistenza')
        ->name('info')
        ->middleware('preventBackHistory');

//visualizzazione catalogo non filtrato

Route::get('/catalogo', 'ControllerPubblico@mostraCatalogo')
        ->name('catalogo')
        ->middleware('preventBackHistory');

//visualizzazione catalogo filtrato

Route::post('/catalogo', 'ControllerPubblico@mostraCatalogoFiltrato')
        ->name('catalogoFiltrato')
        ->middleware('preventBackHistory');

//visualizzazione dettagli prodotto

Route::get('/catalogo/dettagliProdotto/{codice_prodotto}', 'ControllerPubblico@mostraDettagli')
        ->name('dettagliProdotto')
        ->middleware('preventBackHistory');

//visualizzazione malfunzionamenti solo per tecnici, staff e amministratore

Route::get('/catalogo/dettagliProdotto/{codice_prodotto}/dettagliMalfunzionamento/{codice_malfunzionamento}', 'ControllerPubblico@mostraMalfunzionamenti')
        ->name('dettagliMalfunzionamento')
        ->middleware('can:showMalfunzionamenti')
        ->middleware('preventBackHistory');

// ROTTE PER AUTENTICAZIONE
Route::get('login', 'Auth\LoginController@showLoginForm')
        ->name('login');

Route::post('login', 'Auth\LoginController@login');

Route::post('logout', 'Auth\LoginController@logout')
        ->name('logout');


// ROTTE POST AUTENTICAZIONE
 
//rotte tecnico

Route::view('/tecnico', 'AreaUtente2')
        ->name('tecnico')
        ->middleware('can:isTecnico')
        ->middleware('preventBackHistory');

Route::resource('tecnico', 'ControllerLivello2');

//rotte amministratore
Route::view('/amministratore', 'AreaAdmin')
        ->name('amministratore')
        ->middleware('can:isAdmin')
        ->middleware('preventBackHistory');

//ADMIN rotta per la visualizzazione della gestione delle faq

Route::get('/gestioneFAQ', 'AdminController@mostrafaq')
        ->name('gestioneFAQ')
        ->middleware('can:isAdmin')
        ->middleware('preventBackHistory');

//ADMIN gestione FAQ
Route::get('EliminaFAQ/{id}', 'AdminController@cancellafaq')
        ->name('EliminaFAQ')
        ->middleware('can:isAdmin');

Route::view('AggiungiFAQ', 'NuovaFAQ')
        ->name('AggiungiFAQ')
        ->middleware('can:isAdmin')
        ->middleware('preventBackHistory');

Route::post('AggiungiFAQ', 'AdminController@aggiungifaq')
        ->middleware('can:isAdmin');

Route::resource('faqs', 'ControllerFAQ')->middleware('can:isAdmin');

Route::get('/modificafaq/{id}/modifica', 'AdminController@FormFAQ')
        ->name('modificafaq')
        ->middleware('can:isAdmin')
        ->middleware('preventBackHistory');

//ADMIN rotta per la visualizzazione della gestione degli utenti

Route::get('/gestioneUtenti', 'AdminController@vediutenti')
        ->name('gestioneUtenti')
        ->middleware('can:isAdmin')
        ->middleware('preventBackHistory');

//ADMIN aggiunta staff

Route::get('/AggiungiStaff', 'AdminController@formAggiungiStaff')
        ->name('formAggiungiStaff')
        ->middleware('can:isAdmin')
        ->middleware('preventBackHistory');

Route::post('/AggiungiStaff', 'AdminController@aggiungiStaff')
        ->name('AggiungiStaff')
        ->middleware('can:isAdmin');

//ADMIN aggiunta tecnico interno

Route::get('/AggiungiTecnicoInterno', 'AdminController@formAggiungiTecnicoInterno')
        ->name('formAggiungiTecnicoInterno')
        ->middleware('can:isAdmin')
        ->middleware('preventBackHistory');

Route::post('/AggiungiTecnicoInterno', 'AdminController@aggiungiTecnicoInterno')
        ->name('AggiungiTecnicoInterno')
        ->middleware('can:isAdmin');

//ADMIN aggiunta centro assistenza esterno

Route::get('/AggiungiCentroEsterno', 'AdminController@formAggiungiCentroEsterno')
        ->name('formAggiungiCentroEsterno')
        ->middleware('can:isAdmin')
        ->middleware('preventBackHistory');

Route::post('/AggiungiCentroEsterno', 'AdminController@aggiungiCentroEsterno')
        ->name('AggiungiCentroEsterno')
        ->middleware('can:isAdmin');

//ADMIN modifica centro esterno

Route::get('/ModificaCentroEsterno/{codice_centro}/modifica', 'AdminController@formModificaCentroEsterno')
        ->name('ModificaCentroEsterno')
        ->middleware('can:isAdmin')
        ->middleware('preventBackHistory');

Route::resource('admin', 'AdminController');

//ADMIN eliminazione del centro

Route::get('EliminaCentro/{codice_centro}', 'AdminController@eliminaCentro')
        ->name('eliminaCentro')
        ->middleware('can:isAdmin');

//ADMIN aggiunta tecnico esterno

Route::get('/AggiungiTecnicoEsterno', 'AdminController@formAggiungiTecnicoEsterno')
        ->name('formAggiungiTecnicoEsterno')
        ->middleware('can:isAdmin')
        ->middleware('preventBackHistory');

Route::post('/AggiungiTecnicoEsterno', 'AdminController@aggiungiTecnicoEsterno')
        ->name('AggiungiTecnicoEsterno')
        ->middleware('can:isAdmin');

//ADMIN modifica tecnico

Route::get('/ModificaTecnico/{id}/modifica', 'AdminController@formModificaTecnico')
        ->name('ModificaTecnico')
        ->middleware('can:isAdmin')
        ->middleware('preventBackHistory');

Route::resource('tecnicoModifica', 'ControllerModificaTecnico')->middleware('can:isAdmin');

//ADMIN modifica staff

Route::get('/ModificaStaff/{id}/modifica', 'AdminController@formModificaStaff')
        ->name('ModificaStaff')
        ->middleware('can:isAdmin')
        ->middleware('preventBackHistory');


Route::resource('staffModifica', 'ControllerModificaStaff')->middleware('can:isAdmin');

//ADMIN eliminazione utente che sia tecnico o staff

Route::get('EliminaUtente/{id}', 'AdminController@cancella')
        ->name('EliminaUtente')
        ->middleware('can:isAdmin');

//GESIONE PRODOTTO

//ADMIN inserimento prodotto

Route::get('/inserisciProdotto', 'AdminController@mostraFormInserimentoProdotto')
        ->name('inserisciProdotto')
        ->middleware('can:isAdmin')
        ->middleware('preventBackHistory');

Route::post('/inserisciProdotto', 'AdminController@inserisci')
        ->name('inserisci')
        ->middleware('can:isAdmin');

Route::get('/EliminaProdotto/{id}', 'AdminController@eliminaProdotto')
        ->name('EliminaProdotto')
        ->middleware('can:isAdmin');

//ADMIN modifica prodotto

Route::get('/ModificaProdotto/{codice_prodotto}/modifica', 'AdminController@formModificaProdotto')
        ->name('ModificaProdotto')
        ->middleware('can:isAdmin')
        ->middleware('preventBackHistory');

Route::resource('prod', 'ControllerProdotto')->middleware('can:isAdmin');

//ADMIN visualizzazione delle pagine per la gestione di interventi e malfunzionamenti

Route::get('/catalogo/{id}/GestioneMalfunzionamenti/{codice_prodotto}', 'AdminController@AdminGestioneMalfunzionamenti')
        ->name('gestioneMalfunzionamentiProdotto')
        ->middleware('can:isAdmin')
        ->middleware('preventBackHistory');

Route::get('/catalogo/{id}/GestioneMalfunzionamenti/{codice_prodotto}/GestioneInterventi/{codice_malfunzionamento}', 'AdminController@AdminGestioneInterventi')
        ->name('gestioneInterventiProdotto')
        ->middleware('can:isAdmin')
        ->middleware('preventBackHistory');

//ADMIN gestione malfunzionamenti

Route::get('/catalogo/{id}/GestioneMalfunzionamenti/{codice_prodotto}/AggiungiMalfunzionamento', 'AdminController@formInserisciMalfunzionamentoAdmin')
        ->name('inserisciMalfunzionamento')
        ->middleware('can:isAdmin')
        ->middleware('preventBackHistory');

Route::post('/catalogo/{id}/GestioneMalfunzionamenti/{codice_prodotto}/AggiungiMalfunzionamento', 'AdminController@inserisciMalfunzionamentoAdmin')
        ->name('AggiungiMalfunzionamento')
        ->middleware('can:isAdmin');

Route::get('/catalogo/{id}/GestioneMalfunzionamenti/{codice_prodotto}/EliminaMalfunzionamento/{codice_malfunzionamento}', 'AdminController@eliminaMalfunzionamento')
        ->name('eliminaMalfuzionamentoAdmin')
        ->middleware('can:isAdmin');

//ADMIN e STAFF modifica malfunzionamento

Route::get('/ModificaMalfunzionamento/{codice_malfunzionamento}/modifica', 'ControllerMalfunzionamento@formModificaMalfunzionamento')
        ->name('ModificaMalfunzionamento')
        ->middleware('preventBackHistory');

Route::resource('malf', 'ControllerMalfunzionamento');

//ADMIN gestione interventi

Route::get('/catalogo/{id}/GestioneMalfunzionamenti/{codice_prodotto}/GestioneInterventi/{codice_malfunzionamento}/AggiungiIntervento', 'AdminController@formInserisciInterventoAdmin')
        ->name('inserisciIntervento')
        ->middleware('can:isAdmin')
        ->middleware('preventBackHistory');

Route::post('/catalogo/{id}/GestioneMalfunzionamenti/{codice_prodotto}/GestioneInterventi/{codice_malfunzionamento}/AggiungiIntervento', 'AdminController@inserisciInterventoAdmin')
        ->name('AggiungiIntervento')
        ->middleware('can:isAdmin');

Route::get('/catalogo/{id}/GestioneMalfunzionamenti/{codice_prodotto}/GestioneInterventi/{codice_malfunzionamento}/EliminaIntervento/{codice_intervento}', 'AdminController@eliminaIntervento')
        ->name('eliminaInterventoAdmin')
        ->middleware('can:isAdmin');

//ADMIN e STAFF modifica intervento

Route::get('/ModificaIntervento/{codice_intervento}/modifica', 'ControllerIntervento@formModificaIntervento')
        ->name('ModificaIntervento')
        ->middleware('preventBackHistory');

Route::resource('interv', 'ControllerIntervento');

//rotte STAFF (utente livello 3)
Route::view('/staff', 'AreaUtente3')
        ->name('staff')
        ->middleware('can:isStaff')
        ->middleware('preventBackHistory');

//STAFF gestione prodotti

Route::get('/gestioneProdotti/{id}', 'ControllerLivello3@mostraGestioneProdotti')
        ->name('gestioneProdotti')
        ->middleware('can:isStaff')
        ->middleware('preventBackHistory');

//STAFF visualizzazione delle pagine per la gestione di interventi e malfunzionamenti

Route::get('/gestioneProdotti/{id}/GestioneMalfunzionamenti/{codice_prodotto}', 'ControllerLivello3@mostraGestioneMalfunzionamenti')
        ->name('gestioneMalfunzionamenti')
        ->middleware('can:isStaff')
        ->middleware('preventBackHistory');

Route::get('/gestioneProdotti/{id}/GestioneMalfunzionamenti/{codice_prodotto}/GestioneInterventi/{codice_malfunzionamento}', 'ControllerLivello3@mostraGestioneInterventi')
        ->name('gestioneInterventi')
        ->middleware('can:isStaff')
        ->middleware('preventBackHistory');

//STAFF gestione malfunzionamenti

Route::get('/gestioneProdotti/{id}/GestioneMalfunzionamenti/{codice_prodotto}/AggiungiMalfunzionamento', 'ControllerLivello3@formInserisciMalfunzionamento')
        ->name('inserisciMalfunzionamentoStaff')
        ->middleware('can:isStaff')
        ->middleware('preventBackHistory');

Route::post('/gestioneProdotti/{id}/GestioneMalfunzionamenti/{codice_prodotto}/AggiungiMalfunzionamento', 'ControllerLivello3@inserisciMalfunzionamento')
        ->name('AggiungiMalfunzionamentoStaff')
        ->middleware('can:isStaff');

Route::get('/gestioneProdotti/{id}/GestioneMalfunzionamenti/{codice_prodotto}/EliminaMalfunzionamento/{codice_malfunzionamento}', 'ControllerLivello3@eliminaMalfunzionamento')
        ->name('eliminaMalfunzionamentoStaff')
        ->middleware('can:isStaff');

//STAFF gestione interventi

Route::get('/gestioneProdotti/{id}/GestioneMalfunzionamenti/{codice_prodotto}/GestioneInterventi/{codice_malfunzionamento}/AggiungiIntervento', 'ControllerLivello3@formInserisciIntervento')
        ->name('inserisciInterventoStaff')
        ->middleware('can:isStaff')
        ->middleware('preventBackHistory');

Route::post('/gestioneProdotti/{id}/GestioneMalfunzionamenti/{codice_prodotto}/GestioneInterventi/{codice_malfunzionamento}/AggiungiIntervento', 'ControllerLivello3@inserisciIntervento')
        ->name('AggiungiInterventoStaff')
        ->middleware('can:isStaff');

Route::get('/gestioneProdotti/{id}/GestioneMalfunzionamenti/{codice_prodotto}/GestioneInterventi/{codice_malfunzionamento}/EliminaIntervento/{codice_intervento}', 'ControllerLivello3@eliminaIntervento')
        ->name('eliminaInterventoStaff')
        ->middleware('can:isStaff');

Route::resource('staff', 'ControllerLivello3');



