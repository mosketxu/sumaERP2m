<?php

namespace App\Policies;

use App\User;
use App\Empresa;
use App\Role;
use Illuminate\Auth\Access\HandlesAuthorization;

class EmpresaPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the empresa.
     *
     * @param  \App\User  $user
     * @param  \App\Empresa  $empresa
     * @return mixed
     */
    public function view(User $user, Empresa $empresa)
    {
        return true;
    }

    /**
     * Determine whether the user can create empresas.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->role_id === 1;
    }

    /**
     * Determine whether the user can update the empresa.
     *
     * @param  \App\User  $user
     * @param  \App\Empresa  $empresa
     * @return mixed
     */
    public function update(User $user, Empresa $empresa)
    {
        return $user->id > 0;
    }

    /**
     * Determine whether the user can delete the empresa.
     *
     * @param  \App\User  $user
     * @param  \App\Empresa  $empresa
     * @return mixed
     */
    public function delete(User $user, Empresa $empresa)
    {
        return $user->role_id === 1;
    }

    /**
     * Determine whether the user can restore the empresa.
     *
     * @param  \App\User  $user
     * @param  \App\Empresa  $empresa
     * @return mixed
     */
    public function restore(User $user, Empresa $empresa)
    {
        return $user->id > 0;
    }

    /**
     * Determine whether the user can permanently delete the empresa.
     *
     * @param  \App\User  $user
     * @param  \App\Empresa  $empresa
     * @return mixed
     */
    public function forceDelete(User $user, Empresa $empresa)
    {
        //
    }
}
