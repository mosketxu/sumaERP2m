<?php

namespace App\Policies;

use App\User;
use App\Empresa;
use Illuminate\Auth\Access\HandlesAuthorization;

class EmpresaPolicy
{
    use HandlesAuthorization;

    /* Determine whether the user can view the empresa. */
    public function view(User $user, Empresa $empresa)
    {
        // creo que debe ser UserEmpresa
        return $user->owns($empresa);
    }

    /* Determine whether the user can create empresas. */
    public function create(User $user)
    {
        return $user->isAdmin();
    }

    /* Determine whether the user can update the empresa. */
    public function update(User $user, Empresa $empresa)
    {
        return $user->isAdmin();
    }

    /* Determine whether the user can delete the empresa. */
    public function delete(User $user, Empresa $empresa)
    {
        return $user->isAdmin();
    }

    /* Determine whether the user can restore the empresa. */
    public function restore(User $user, Empresa $empresa)
    {
        return $user->isAdmin();
    }

    /* Determine whether the user can permanently delete the empresa. */
    public function forceDelete(User $user, Empresa $empresa)
    {
        //
    }
}
