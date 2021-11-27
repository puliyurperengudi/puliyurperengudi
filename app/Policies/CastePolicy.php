<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Caste;
use Illuminate\Auth\Access\HandlesAuthorization;

class CastePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the caste can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list castes');
    }

    /**
     * Determine whether the caste can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Caste  $model
     * @return mixed
     */
    public function view(User $user, Caste $model)
    {
        return $user->hasPermissionTo('view castes');
    }

    /**
     * Determine whether the caste can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create castes');
    }

    /**
     * Determine whether the caste can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Caste  $model
     * @return mixed
     */
    public function update(User $user, Caste $model)
    {
        return $user->hasPermissionTo('update castes');
    }

    /**
     * Determine whether the caste can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Caste  $model
     * @return mixed
     */
    public function delete(User $user, Caste $model)
    {
        return $user->hasPermissionTo('delete castes');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Caste  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete castes');
    }

    /**
     * Determine whether the caste can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Caste  $model
     * @return mixed
     */
    public function restore(User $user, Caste $model)
    {
        return false;
    }

    /**
     * Determine whether the caste can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Caste  $model
     * @return mixed
     */
    public function forceDelete(User $user, Caste $model)
    {
        return false;
    }
}
