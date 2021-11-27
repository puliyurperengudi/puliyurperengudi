<?php

namespace App\Policies;

use App\Models\User;
use App\Models\TaxPayers;
use Illuminate\Auth\Access\HandlesAuthorization;

class TaxPayersPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the taxPayers can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list alltaxpayers');
    }

    /**
     * Determine whether the taxPayers can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\TaxPayers  $model
     * @return mixed
     */
    public function view(User $user, TaxPayers $model)
    {
        return $user->hasPermissionTo('view alltaxpayers');
    }

    /**
     * Determine whether the taxPayers can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create alltaxpayers');
    }

    /**
     * Determine whether the taxPayers can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\TaxPayers  $model
     * @return mixed
     */
    public function update(User $user, TaxPayers $model)
    {
        return $user->hasPermissionTo('update alltaxpayers');
    }

    /**
     * Determine whether the taxPayers can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\TaxPayers  $model
     * @return mixed
     */
    public function delete(User $user, TaxPayers $model)
    {
        return $user->hasPermissionTo('delete alltaxpayers');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\TaxPayers  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete alltaxpayers');
    }

    /**
     * Determine whether the taxPayers can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\TaxPayers  $model
     * @return mixed
     */
    public function restore(User $user, TaxPayers $model)
    {
        return false;
    }

    /**
     * Determine whether the taxPayers can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\TaxPayers  $model
     * @return mixed
     */
    public function forceDelete(User $user, TaxPayers $model)
    {
        return false;
    }
}
