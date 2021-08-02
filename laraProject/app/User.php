<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable {

    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nome', 'cognome', 'email', 'username', 'password','via','citta','cap','sesso','cellulare',
        //aggiunti surnae e username
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'username', 'password', 'remember_token',
        //attributi che non devono essere mai mostrati
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    //verifica che l'utente loggato abbia il ruolo che ci serve
    public function hasRole($role) {
        $role = (array)$role;
        return in_array($this->categoria, $role);
    }

}
