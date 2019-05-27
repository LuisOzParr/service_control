<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UsersPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the model.
     *
     * @param User $admin
     * @param  \App\User $user
     * @return mixed
     */
    public function changeState(User $admin, User $user)
    {
       if($admin->rol->rol == 'admin'){
           if($user->rol->rol != 'admin'){
               return true;
           }
       }
       return false;
    }


}
