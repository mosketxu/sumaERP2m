<?php

namespace App\Policies;

use App\{User,UserEmpresa};
use Illuminate\Auth\Access\HandlesAuthorization;

class UserEmpresaPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function view(User $user, UserEmpresa $userEmpresa)
    {
        return $user->owns($userEmpresa);
    }
}
