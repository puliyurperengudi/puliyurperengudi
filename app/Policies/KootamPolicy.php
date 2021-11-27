<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Kootam;
use Illuminate\Auth\Access\HandlesAuthorization;

class KootamPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the kootam can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list kootams');
    }

    /**
     * Determine whether the kootam can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Kootam  $model
     * @return mixed
     */
    public function view(User $user, Kootam $model)
    {
        return $user->hasPermissionTo('view kootams');
    }

    /**
     * Determine whether the kootam can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create kootams');
    }

    /**
     * Determine whether the kootam can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Kootam  $model
     * @return mixed
     */
    public function update(User $user, Kootam $model)
    {
        return $user->hasPermissionTo('update kootams');
    }

    /**
     * Determine whether the kootam can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Kootam  $model
     * @return mixed
     */
    public function delete(User $user, Kootam $model)
    {
        return $user->hasPermissionTo('delete kootams');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Kootam  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete kootams');
    }

    /**
     * Determine whether the kootam can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Kootam  $model
     * @return mixed
     */
    public function restore(User $user, Kootam $model)
    {
        return false;
    }

    /**
     * Determine whether the kootam can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Kootam  $model
     * @return mixed
     */
    public function forceDelete(User $user, Kootam $model)
    {
        return false;
    }
}
