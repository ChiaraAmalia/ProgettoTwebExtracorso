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
Route::view('/', 'homePubblica')
        ->name('homePubblica')
        ->middleware('preventBackHistory');

Route::get('/faq', 'ControllerPubblico@mostrafaq')
        ->name('faq')
        ->middleware('preventBackHistory');

Route::get('/info', 'ControllerPubblico@mostraCentriAssistenza')
        ->name('info')
        ->middleware('preventBackHistory');

Route::get('/catalogo', 'ControllerPubblico@mostraCatalogo')
        ->name('catalogo')
        ->middleware('preventBackHistory');

Route::post('/catalogo', 'ControllerPubblico@mostraCatalogoFiltrato')
        ->name('catalogoFiltrato')
        ->middleware('preventBackHistory');

Route::get('/catalogo/dettagliProdotto/{codice_prodotto}', 'ControllerPubblico@mostraDettagli')
        ->name('dettagliProdotto')
        ->middleware('preventBackHistory');

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
//FINE
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

Route::get('/gestioneFAQ', 'AdminController@mostrafaq')
        ->name('gestioneFAQ')
        ->middleware('can:isAdmin')
        ->middleware('preventBackHistory');

Route::get('/gestioneUtenti', 'AdminController@vediutenti')
        ->name('gestioneUtenti')
        ->middleware('can:isAdmin')
        ->middleware('preventBackHistory');

Route::view('AggiungiOrganizzatore', 'registrazioneOrganizzatore')
        ->name('AggiungiOrganizzatore')
        ->middleware('can:isAdmin')
        ->middleware('preventBackHistory');

Route::post('AggiungiOrganizzatore', 'AdminController@aggiungiOrganizzatore')
        ->middleware('can:isAdmin');

Route::resource('admin', 'AdminController');

Route::get('/modificaorganizzatore/{id}/modifica', 'AdminController@FormOrganizzatori')
        ->name('modificaorganizzatore')
        ->middleware('can:isAdmin')
        ->middleware('preventBackHistory');

Route::get('EliminaUtente/{id}', 'AdminController@cancella')
        ->name('EliminaUtente')
        ->middleware('can:isAdmin');

Route::get('EliminaCentro/{codice_centro}', 'AdminController@eliminaCentro')
        ->name('eliminaCentro')
        ->middleware('can:isAdmin');

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

//ADMIN gestione prodotto

Route::get('/catalogo/{id}/GestioneMalfunzionamenti/{codice_prodotto}', 'AdminController@AdminGestioneMalfunzionamenti')
        ->name('gestioneMalfunzionamentiProdotto')
        ->middleware('can:isAdmin')
        ->middleware('preventBackHistory');

Route::get('/catalogo/{id}/GestioneMalfunzionamenti/{codice_prodotto}/GestioneInterventi/{codice_malfunzionamento}', 'AdminController@AdminGestioneInterventi')
        ->name('gestioneInterventiProdotto')
        ->middleware('can:isAdmin')
        ->middleware('preventBackHistory');

Route::get('/EliminaProdotto/{id}', 'AdminController@eliminaProdotto')
        ->name('EliminaProdotto')
        ->middleware('can:isAdmin');

//malfunzionamenti

Route::get('/catalogo/{id}/GestioneMalfunzionamenti/{codice_prodotto}/EliminaMalfunzionamento/{codice_malfunzionamento}', 'AdminController@eliminaMalfunzionamento')
        ->name('eliminaMalfuzionamentoAdmin')
        ->middleware('can:isAdmin');

Route::get('/catalogo/{id}/GestioneMalfunzionamenti/{codice_prodotto}/AggiungiMalfunzionamento', 'AdminController@formInserisciMalfunzionamentoAdmin')
        ->name('inserisciMalfunzionamento');

Route::post('/catalogo/{id}/GestioneMalfunzionamenti/{codice_prodotto}/AggiungiMalfunzionamento', 'AdminController@inserisciMalfunzionamentoAdmin')
        ->name('AggiungiMalfunzionamento');

//interventi

Route::get('/catalogo/{id}/GestioneMalfunzionamenti/{codice_prodotto}/GestioneInterventi/{codice_malfunzionamento}/AggiungiIntervento', 'AdminController@formInserisciInterventoAdmin')
        ->name('inserisciIntervento')
        ->middleware('can:isAdmin');

Route::post('/catalogo/{id}/GestioneMalfunzionamenti/{codice_prodotto}/GestioneInterventi/{codice_malfunzionamento}/AggiungiIntervento', 'AdminController@inserisciInterventoAdmin')
        ->name('AggiungiIntervento')
        ->middleware('can:isAdmin');

Route::get('/catalogo/{id}/GestioneMalfunzionamenti/{codice_prodotto}/GestioneInterventi/{codice_malfunzionamento}/EliminaIntervento/{codice_intervento}', 'AdminController@eliminaIntervento')
        ->name('eliminaInterventoAdmin')
        ->middleware('can:isAdmin');

//inserimento prodotto

Route::get('/inserisciProdotto', 'AdminController@mostraFormInserimentoProdotto')
        ->name('inserisciProdotto')
        ->middleware('can:isAdmin')
        ->middleware('preventBackHistory');

Route::post('/inserisciProdotto', 'AdminController@inserisci')
        ->name('inserisci')
        ->middleware('can:isAdmin')
        ->middleware('preventBackHistory');

//ADMIN modifica prodotto

Route::get('/ModificaProdotto/{codice_prodotto}/modifica', 'AdminController@formModificaProdotto')
        ->name('ModificaProdotto')
        ->middleware('can:isAdmin')
        ->middleware('preventBackHistory');

Route::resource('prod', 'ControllerProdotto')->middleware('can:isAdmin');

//modifica malfunzionamento

Route::get('/ModificaMalfunzionamento/{codice_malfunzionamento}/modifica', 'ControllerMalfunzionamento@formModificaMalfunzionamento')
        ->name('ModificaMalfunzionamento')
        ->middleware('preventBackHistory');

Route::resource('malf', 'ControllerMalfunzionamento');

//modifica intervento

Route::get('/ModificaIntervento/{codice_intervento}/modifica', 'ControllerIntervento@formModificaIntervento')
        ->name('ModificaIntervento')
        ->middleware('preventBackHistory');

Route::resource('interv', 'ControllerIntervento');

//rotte staff (utente livello 3)
Route::view('/staff', 'AreaUtente3')
        ->name('staff')
        ->middleware('can:isStaff')
        ->middleware('preventBackHistory');

Route::get('/gestioneProdotti/{id}', 'ControllerLivello3@mostraGestioneProdotti')
        ->name('gestioneProdotti')
        ->middleware('can:isStaff')
        ->middleware('preventBackHistory');

Route::get('/gestioneProdotti/{id}/GestioneMalfunzionamenti/{codice_prodotto}', 'ControllerLivello3@mostraGestioneMalfunzionamenti')
        ->name('gestioneMalfunzionamenti')
        ->middleware('can:isStaff')
        ->middleware('preventBackHistory');

Route::get('/gestioneProdotti/{id}/GestioneMalfunzionamenti/{codice_prodotto}/GestioneInterventi/{codice_malfunzionamento}', 'ControllerLivello3@mostraGestioneInterventi')
        ->name('gestioneInterventi')
        ->middleware('can:isStaff')
        ->middleware('preventBackHistory');

//malfunzionamenti

Route::get('/gestioneProdotti/{id}/GestioneMalfunzionamenti/{codice_prodotto}/AggiungiMalfunzionamento', 'ControllerLivello3@formInserisciMalfunzionamento')
        ->name('inserisciMalfunzionamentoStaff');

Route::post('/gestioneProdotti/{id}/GestioneMalfunzionamenti/{codice_prodotto}/AggiungiMalfunzionamento', 'ControllerLivello3@inserisciMalfunzionamento')
        ->name('AggiungiMalfunzionamentoStaff');

Route::get('/gestioneProdotti/{id}/GestioneMalfunzionamenti/{codice_prodotto}/EliminaMalfunzionamento/{codice_malfunzionamento}', 'ControllerLivello3@eliminaMalfunzionamento')
        ->name('eliminaMalfunzionamentoStaff')
        ->middleware('can:isStaff');

//interventi

Route::get('/gestioneProdotti/{id}/GestioneMalfunzionamenti/{codice_prodotto}/GestioneInterventi/{codice_malfunzionamento}/AggiungiIntervento', 'ControllerLivello3@formInserisciIntervento')
        ->name('inserisciInterventoStaff')
        ->middleware('can:isStaff');

Route::post('/gestioneProdotti/{id}/GestioneMalfunzionamenti/{codice_prodotto}/GestioneInterventi/{codice_malfunzionamento}/AggiungiIntervento', 'ControllerLivello3@inserisciIntervento')
        ->name('AggiungiInterventoStaff')
        ->middleware('can:isStaff');

Route::get('/gestioneProdotti/{id}/GestioneMalfunzionamenti/{codice_prodotto}/GestioneInterventi/{codice_malfunzionamento}/EliminaIntervento/{codice_intervento}', 'ControllerLivello3@eliminaIntervento')
        ->name('eliminaInterventoStaff')
        ->middleware('can:isStaff');

Route::resource('staff', 'ControllerLivello3');

Route::get('/ModificaEvento/{id}/modifica', 'ControllerLivello3@modificaEvento')
        ->name('ModificaEvento')
        ->middleware('can:isOrganizer')
        ->middleware('preventBackHistory');

Route::get('/statisticheOrga/{codice_evento}/vedi', 'ControllerLivello3@statistiche')
        ->name('statisticheOrga')
        ->middleware('can:isOrganizer')
        ->middleware('preventBackHistory');



