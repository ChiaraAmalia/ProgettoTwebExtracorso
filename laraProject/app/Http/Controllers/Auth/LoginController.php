<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller {
    /*
      |--------------------------------------------------------------------------
      | Login Controller
      |--------------------------------------------------------------------------
      |
      | This controller handles authenticating users for the application and
      | redirecting them to your home screen. The controller uses a trait
      | to conveniently provide its functionality to your applications.
      |
     */

use AuthenticatesUsers;

    protected function redirectTo() {        
        $role = auth()->user()->categoria;
        switch ($role) { 
            //redirect sulla pagina competente rispetto al livello di utente
            case 'amministratore': return '/amministratore';
                break;
            case 'cliente': return '/cliente';
                break;
            case 'organizzatore': return '/organizzatore';
                break;
            default: return '/';
        };
    }

    /**
     * Override:: per il login usiamo 'username' al posto di 'email'.
     *
     */
    public function username() {
        return 'username';
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('guest')->except('logout');
    }

}
