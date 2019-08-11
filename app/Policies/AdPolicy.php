<?php

namespace App\Policies;

use App\User;
use App\Ad;
use Illuminate\Auth\Access\HandlesAuthorization;

class AdPolicy
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


    public function update(User $user, Ad $ad)
    {
        return $user->id === $ad->user_id;
    }

    public function destroy(User $user, Ad $ad)
    {
        return $user->id === $ad->user_id;
    }
}
