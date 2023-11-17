<?php

namespace App\Policies;

use App\Models\User;
use App\Models\GuestUsers;
use Illuminate\Auth\Access\HandlesAuthorization;

class GuestUsersPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the guestUsers can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the guestUsers can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\GuestUsers  $model
     * @return mixed
     */
    public function view(User $user, GuestUsers $model)
    {
        return true;
    }

    /**
     * Determine whether the guestUsers can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the guestUsers can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\GuestUsers  $model
     * @return mixed
     */
    public function update(User $user, GuestUsers $model)
    {
        return true;
    }

    /**
     * Determine whether the guestUsers can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\GuestUsers  $model
     * @return mixed
     */
    public function delete(User $user, GuestUsers $model)
    {
        return true;
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\GuestUsers  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the guestUsers can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\GuestUsers  $model
     * @return mixed
     */
    public function restore(User $user, GuestUsers $model)
    {
        return false;
    }

    /**
     * Determine whether the guestUsers can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\GuestUsers  $model
     * @return mixed
     */
    public function forceDelete(User $user, GuestUsers $model)
    {
        return false;
    }
}
