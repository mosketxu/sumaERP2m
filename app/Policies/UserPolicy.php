<?php

namespace App\Policies;

use App \{
    User
};
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

class UserPolicy
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

    /* Determine whether the user can view the users. */
    public function view(User $user)
    {
        return $user->isAdmin();
    }

    /* Determine whether the user can create users. */
    public function create(User $user)
    {
        return $user->isAdmin();
    }

    /* Determine whether the user can update users. */
    public function update(User $user)
    {
        return $user->isAdmin();
    }

    /* Determine whether the user can delete the user. */
    public function delete(User $user)
    {
        return $user->isAdmin();
    }

    /* Determine whether the user can restore the empresa. */
    public function restore(User $user)
    {
        return $user->isAdmin();
    }

    /* Determine whether the user can permanently delete the user. */
    public function forceDelete(User $user)
    {
        //
    }
}
