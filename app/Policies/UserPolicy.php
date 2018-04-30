<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

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

    public function isChef(User $user)
    {
        return $user->role === "chef";
    }

    public function isOwner(User $user)
    {
        return $user->role == "owner";
    }

    public function isWaiter(User $user)
    {
        return $user->role === "waiter";
    }



}
