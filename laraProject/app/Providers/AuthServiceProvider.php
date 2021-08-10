<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
            // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot() {
        $this->registerPolicies();

        Gate::define('isAdmin', function ($user) {
            return $user->hasRole('amministratore');
        });

        Gate::define('isTecnico', function ($user) {
            return $user->hasRole('tecnico');
        });
        
        Gate::define('isStaff', function ($user) {
            return $user->hasRole('staff');
        });

         Gate::define('showMalfunzionamenti', function ($user) {
            return $user->hasRole(['tecnico', 'staff', 'amministratore']);
        });

    }
}
