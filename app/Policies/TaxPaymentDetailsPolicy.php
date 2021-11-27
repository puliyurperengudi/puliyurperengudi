<?php

namespace App\Policies;

use App\Models\User;
use App\Models\TaxPaymentDetails;
use Illuminate\Auth\Access\HandlesAuthorization;

class TaxPaymentDetailsPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the taxPaymentDetails can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list alltaxpaymentdetails');
    }

    /**
     * Determine whether the taxPaymentDetails can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\TaxPaymentDetails  $model
     * @return mixed
     */
    public function view(User $user, TaxPaymentDetails $model)
    {
        return $user->hasPermissionTo('view alltaxpaymentdetails');
    }

    /**
     * Determine whether the taxPaymentDetails can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create alltaxpaymentdetails');
    }

    /**
     * Determine whether the taxPaymentDetails can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\TaxPaymentDetails  $model
     * @return mixed
     */
    public function update(User $user, TaxPaymentDetails $model)
    {
        return $user->hasPermissionTo('update alltaxpaymentdetails');
    }

    /**
     * Determine whether the taxPaymentDetails can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\TaxPaymentDetails  $model
     * @return mixed
     */
    public function delete(User $user, TaxPaymentDetails $model)
    {
        return $user->hasPermissionTo('delete alltaxpaymentdetails');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\TaxPaymentDetails  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete alltaxpaymentdetails');
    }

    /**
     * Determine whether the taxPaymentDetails can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\TaxPaymentDetails  $model
     * @return mixed
     */
    public function restore(User $user, TaxPaymentDetails $model)
    {
        return false;
    }

    /**
     * Determine whether the taxPaymentDetails can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\TaxPaymentDetails  $model
     * @return mixed
     */
    public function forceDelete(User $user, TaxPaymentDetails $model)
    {
        return false;
    }
}
