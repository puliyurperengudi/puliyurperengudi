<?php

namespace App\Policies;

use App\Models\User;
use App\Models\TaxList;
use Illuminate\Auth\Access\HandlesAuthorization;

class TaxListPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the taxList can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list taxlists');
    }

    /**
     * Determine whether the taxList can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\TaxList  $model
     * @return mixed
     */
    public function view(User $user, TaxList $model)
    {
        return $user->hasPermissionTo('view taxlists');
    }

    /**
     * Determine whether the taxList can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create taxlists');
    }

    /**
     * Determine whether the taxList can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\TaxList  $model
     * @return mixed
     */
    public function update(User $user, TaxList $model)
    {
        return $user->hasPermissionTo('update taxlists');
    }

    /**
     * Determine whether the taxList can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\TaxList  $model
     * @return mixed
     */
    public function delete(User $user, TaxList $model)
    {
        return $user->hasPermissionTo('delete taxlists');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\TaxList  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete taxlists');
    }

    /**
     * Determine whether the taxList can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\TaxList  $model
     * @return mixed
     */
    public function restore(User $user, TaxList $model)
    {
        return false;
    }

    /**
     * Determine whether the taxList can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\TaxList  $model
     * @return mixed
     */
    public function forceDelete(User $user, TaxList $model)
    {
        return false;
    }
}
