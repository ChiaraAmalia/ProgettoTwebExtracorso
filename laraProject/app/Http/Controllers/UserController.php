<?php

namespace App\Http\Controllers;



class userController extends Controller {

    public function __construct() {
        $this->middleware('auth');  //verifica che l'utente sia autenticato
    }

    public function index() {
        $role = auth()->user()->categoria;
        switch ($role) {
            case 'amministratore': view('AreaAdmin');
                break;
            case 'tecnico': view('AreaUtente2');
                break;
            case 'staff': view('AreaUtente3');
                break;
            default: return view('homePubblica');
        }
        return view('homePubblica');
    }
}