<?php

namespace App\Policies;

use App\Models\User;
use App\Models\ExpenseType;
use Illuminate\Auth\Access\HandlesAuthorization;

class ExpenseTypePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the expenseType can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list expensetypes');
    }

    /**
     * Determine whether the expenseType can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\ExpenseType  $model
     * @return mixed
     */
    public function view(User $user, ExpenseType $model)
    {
        return $user->hasPermissionTo('view expensetypes');
    }

    /**
     * Determine whether the expenseType can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create expensetypes');
    }

    /**
     * Determine whether the expenseType can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\ExpenseType  $model
     * @return mixed
     */
    public function update(User $user, ExpenseType $model)
    {
        return $user->hasPermissionTo('update expensetypes');
    }

    /**
     * Determine whether the expenseType can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\ExpenseType  $model
     * @return mixed
     */
    public function delete(User $user, ExpenseType $model)
    {
        return $user->hasPermissionTo('delete expensetypes');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\ExpenseType  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete expensetypes');
    }

    /**
     * Determine whether the expenseType can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\ExpenseType  $model
     * @return mixed
     */
    public function restore(User $user, ExpenseType $model)
    {
        return false;
    }

    /**
     * Determine whether the expenseType can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\ExpenseType  $model
     * @return mixed
     */
    public function forceDelete(User $user, ExpenseType $model)
    {
        return false;
    }
}
