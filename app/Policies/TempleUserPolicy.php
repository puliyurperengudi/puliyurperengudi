<?php

namespace App\Policies;

use App\Models\User;
use App\Models\TempleUser;
use Illuminate\Auth\Access\HandlesAuthorization;

class TempleUserPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the templeUser can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list templeusers');
    }

    /**
     * Determine whether the templeUser can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\TempleUser  $model
     * @return mixed
     */
    public function view(User $user, TempleUser $model)
    {
        return $user->hasPermissionTo('view templeusers');
    }

    /**
     * Determine whether the templeUser can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create templeusers');
    }

    /**
     * Determine whether the templeUser can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\TempleUser  $model
     * @return mixed
     */
    public function update(User $user, TempleUser $model)
    {
        return $user->hasPermissionTo('update templeusers');
    }

    /**
     * Determine whether the templeUser can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\TempleUser  $model
     * @return mixed
     */
    public function delete(User $user, TempleUser $model)
    {
        return $user->hasPermissionTo('delete templeusers');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\TempleUser  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete templeusers');
    }

    /**
     * Determine whether the templeUser can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\TempleUser  $model
     * @return mixed
     */
    public function restore(User $user, TempleUser $model)
    {
        return false;
    }

    /**
     * Determine whether the templeUser can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\TempleUser  $model
     * @return mixed
     */
    public function forceDelete(User $user, TempleUser $model)
    {
        return false;
    }
}
