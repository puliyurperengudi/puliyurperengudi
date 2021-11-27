<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Vagera;
use Illuminate\Auth\Access\HandlesAuthorization;

class VageraPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the vagera can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list vageras');
    }

    /**
     * Determine whether the vagera can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Vagera  $model
     * @return mixed
     */
    public function view(User $user, Vagera $model)
    {
        return $user->hasPermissionTo('view vageras');
    }

    /**
     * Determine whether the vagera can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create vageras');
    }

    /**
     * Determine whether the vagera can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Vagera  $model
     * @return mixed
     */
    public function update(User $user, Vagera $model)
    {
        return $user->hasPermissionTo('update vageras');
    }

    /**
     * Determine whether the vagera can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Vagera  $model
     * @return mixed
     */
    public function delete(User $user, Vagera $model)
    {
        return $user->hasPermissionTo('delete vageras');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Vagera  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete vageras');
    }

    /**
     * Determine whether the vagera can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Vagera  $model
     * @return mixed
     */
    public function restore(User $user, Vagera $model)
    {
        return false;
    }

    /**
     * Determine whether the vagera can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Vagera  $model
     * @return mixed
     */
    public function forceDelete(User $user, Vagera $model)
    {
        return false;
    }
}
