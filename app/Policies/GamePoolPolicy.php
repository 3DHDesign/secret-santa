<?php

namespace App\Policies;

use App\Models\User;
use App\Models\GamePool;
use Illuminate\Auth\Access\HandlesAuthorization;

class GamePoolPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the gamePool can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the gamePool can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\GamePool  $model
     * @return mixed
     */
    public function view(User $user, GamePool $model)
    {
        return true;
    }

    /**
     * Determine whether the gamePool can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the gamePool can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\GamePool  $model
     * @return mixed
     */
    public function update(User $user, GamePool $model)
    {
        return true;
    }

    /**
     * Determine whether the gamePool can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\GamePool  $model
     * @return mixed
     */
    public function delete(User $user, GamePool $model)
    {
        return true;
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\GamePool  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the gamePool can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\GamePool  $model
     * @return mixed
     */
    public function restore(User $user, GamePool $model)
    {
        return false;
    }

    /**
     * Determine whether the gamePool can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\GamePool  $model
     * @return mixed
     */
    public function forceDelete(User $user, GamePool $model)
    {
        return false;
    }
}
