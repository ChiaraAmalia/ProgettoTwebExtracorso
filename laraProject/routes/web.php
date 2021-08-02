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

Route::get('/catalogo/dettagliEvento/{codice_evento}', 'ControllerPubblico@mostraDettagli')
        ->name('dettagliEvento')
        ->middleware('preventBackHistory');

// ROTTE PER AUTENTICAZIONE
Route::get('login', 'Auth\LoginController@showLoginForm')
        ->name('login');

Route::post('login', 'Auth\LoginController@login');

Route::post('logout', 'Auth\LoginController@logout')
        ->name('logout');
//FINE
// ROTTE REGISTRAZIONE
Route::get('register', 'Auth\RegisterController@showRegistrationForm')
        ->name('register');

Route::post('register', 'Auth\RegisterController@register');
//FINE
// ROTTE POST AUTENTICAZIONE
//rotte cliente
Route::view('/cliente', 'AreaUtente2')
        ->name('cliente')
        ->middleware('can:isUser')
        ->middleware('preventBackHistory');

Route::get('/catalogo/acquisto/{codice_evento}', 'ControllerLivello2@acquisto')
        ->name('acquisto')
        ->middleware('can:isUser')
        ->middleware('preventBackHistory');

Route::get('/storico/{id}', 'ControllerLivello2@mostraStorico')
        ->name('storico')
        ->middleware('can:isUser')
        ->middleware('preventBackHistory');

Route::get('/partecipero/{id}', 'ControllerLivello2@mostraCatalogo')
        ->name('partecipero')
        ->middleware('can:isUser')
        ->middleware('preventBackHistory');

Route::view('/modificalivello2', 'ModificaUtente2')
        ->name('modificalivello2')
        ->middleware('can:isUser')
        ->middleware('preventBackHistory');

Route::get('/qrcode/{stringa}', function ($stringa) {
    return QrCode::size(250)
                    ->backgroundColor(224, 122, 114)
                    ->generate("$stringa");})
        ->name('qrcode')
        ->middleware('can:isUser')
        ->middleware('preventBackHistory');

Route::resource('user', 'ControllerLivello2');

Route::post('creaBiglietto', 'ControllerLivello2@creaBiglietto')
        ->name('creaBiglietto')
        ->middleware('can:isUser');

Route::post('partecipero', 'ControllerLivello2@partecipero')
        ->name('partecipero')
        ->middleware('can:isUser');

Route::get('vedipartecipero/{id}','ControllerLivello2@vedipartecipero')
        ->name('vedipartecipero')
        ->middleware('can:isUser')
        ->middleware('preventBackHistory');

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

Route::get('/statistiche/{id}/vedi', 'AdminController@statistiche')
        ->name('statistiche')
        ->middleware('can:isAdmin')
        ->middleware('preventBackHistory');

//rotte organizzatore (utente livello 3)
Route::view('/organizzatore', 'AreaUtente3')
        ->name('organizzatore')
        ->middleware('can:isOrganizer')
        ->middleware('preventBackHistory');

Route::get('/gestioneEventi/{id}', 'ControllerLivello3@mostraGestioneEventi')
        ->name('gestioneEventi')
        ->middleware('can:isOrganizer')
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

Route::resource('organizer', 'ControllerLivello3');

Route::get('/ModificaEvento/{id}/modifica', 'ControllerLivello3@modificaEvento')
        ->name('ModificaEvento')
        ->middleware('can:isOrganizer')
        ->middleware('preventBackHistory');

Route::get('/statisticheOrga/{codice_evento}/vedi', 'ControllerLivello3@statistiche')
        ->name('statisticheOrga')
        ->middleware('can:isOrganizer')
        ->middleware('preventBackHistory');



