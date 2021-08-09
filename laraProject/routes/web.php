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

Route::view('/info', 'info')
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

Route::get('/gestioneProdotti/{id}', 'ControllerLivello3@mostraGestioneProdotti')
        ->name('gestioneProdotti')
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

//rotte staff (utente livello 3)
Route::view('/staff', 'AreaUtente3')
        ->name('staff')
        ->middleware('can:isStaff')
        ->middleware('preventBackHistory');

Route::get('/inserisciEvento', 'ControllerLivello3@mostraFormInserimento')
        ->name('inserisciEvento')
        ->middleware('can:isOrganizer')
        ->middleware('preventBackHistory');

Route::post('/inserisciEvento', 'ControllerLivello3@inserisciEvento')
        ->name('inserisci')
        ->middleware('can:isOrganizer')
        ->middleware('preventBackHistory');

Route::get('/EliminaEvento/{id}', 'ControllerLivello3@eliminaEvento')
        ->name('EliminaEvento')
        ->middleware('can:isOrganizer');

Route::resource('staff', 'ControllerLivello3');

Route::get('/ModificaEvento/{id}/modifica', 'ControllerLivello3@modificaEvento')
        ->name('ModificaEvento')
        ->middleware('can:isOrganizer')
        ->middleware('preventBackHistory');

Route::get('/statisticheOrga/{codice_evento}/vedi', 'ControllerLivello3@statistiche')
        ->name('statisticheOrga')
        ->middleware('can:isOrganizer')
        ->middleware('preventBackHistory');



