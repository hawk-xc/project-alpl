<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Customer;
use App\Models\CustomerBill;
use Illuminate\Contracts\Auth\Authenticatable;

class CustomerBillPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(Authenticatable $user): bool
    {
        if ($user instanceof Customer) {
            return true;
        }

        if ($user instanceof User) {
            return true;
        }

        return false;
    }

    public function view(Authenticatable $user, CustomerBill $bill): bool
    {
        if ($user instanceof Customer) {
            return $bill->customer_id === $user->id;
        }

        if ($user instanceof User) {
            return true;
        }

        return false;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(Customer $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(Authenticatable $user, CustomerBill $bill): bool
    {
        if ($user instanceof Customer) {
            return $bill->customer_id === $user->id;
        }

        if ($user instanceof User) {
            return true;
        }

        return false;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(Authenticatable $user, CustomerBill $bill): bool
    {
        if ($user instanceof Customer) {
            return $bill->customer_id === $user->id;
        }

        if ($user instanceof User) {
            return true;
        }

        return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(Authenticatable $user, CustomerBill $bill): bool
    {
        if ($user instanceof Customer) {
            return $bill->customer_id === $user->id;
        }

        if ($user instanceof User) {
            return true;
        }

        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(Authenticatable $user, CustomerBill $bill): bool
    {
        if ($user instanceof Customer) {
            return $bill->customer_id === $user->id;
        }

        if ($user instanceof User) {
            return true;
        }

        return false;
    }
}
