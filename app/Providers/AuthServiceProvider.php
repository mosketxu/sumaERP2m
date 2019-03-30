<?php

namespace App\Providers;

use App \{
    User,
    Policies\EmpresaPolicy,
    Policies\UserEmpresaPolicy
};


use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;


class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Empresa' => 'App\Policies\EmpresaPolicy',
        'App\User' => 'App\Policies\UserPolicy',
        'App\UserEmpresa' => 'App\Policies\UserEmpresaPolicy',
        //        Empresa::class => EmpresaPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::before(function (User $user)
        {
            if($user->isAdmin()){
                return true;
            }

            if($user->isInactive()){
                return false;
            }

            return null; //no hace falta esta linea. Si no la pongo inplicitamente es null si no es admin.
        });

        // Gate::define('update-user', function (User $user, User $usuario) {
            // return $user->role_id === 1; quito la comprobacion pq está en el before
        // });

        
        // Gate::define('update-empresa', function (User $user, Empresa $empresa) {
            // return $user->role_id === 1; Ya está en before
        // });

        // Gate::define('delete-empresa', function (User $user, Empresa $empresa) {
            // return $user->role_id === 1; Ya está en before
        // });

        // Quito los Gate de aqui y los llevo a Gate::resource para tenerlos contra los típicos metodos CRUD

        // Gate::resource('empresa',EmpresaPolicy::class);

        // Gate::define('view-userempresa', function (User $user, UserEmpresa $userEmpresa) {
        //         return $user->owns($userEmpresa);
        // }); me la he llevado a UserEmpresaPolicy
        // Gate::define('view-userempresa', 'App\Policies\UserEmpresaPolicy@view');
        // Gate::resource('userempresa',UserEmpresaPolicy::class);

    }
}
