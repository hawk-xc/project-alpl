<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Customer;
use App\Models\CustomerBill;
use Illuminate\Auth\Access\Response;
use Illuminate\Contracts\Auth\Authenticatable;

class CustomerBillPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(Customer $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(Authenticatable $user, CustomerBill $bill): bool
    {
        return (int) $bill->customer_id === (int) $user->getAuthIdentifier();
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(Customer $user): bool
    {
        return $user->is_admin;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(Customer $user, CustomerBill $customerBill): bool
    {
        return $customerBill->customer_id === $user->id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(Customer $user, CustomerBill $customerBill): bool
    {
        return $customerBill->customer_id === $user->id;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(Customer $user, CustomerBill $customerBill): bool
    {
        return $customerBill->customer_id === $user->id;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(Customer $user, CustomerBill $customerBill): bool
    {
        return $customerBill->customer_id === $user->id;
    }
}
