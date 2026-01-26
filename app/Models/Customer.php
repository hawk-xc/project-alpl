<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Customer extends Model
{
    use HasRoles;

    protected $fillable = [
        'tariff_id',
        'name',
        'username',
        'address',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    // relationship
    public function customerTariff()
    {
        return $this->belongsTo(CustomerTariff::class, 'tariff_id');
    }

    public function customerBills()
    {
        return $this->hasMany(CustomerBill::class, 'customer_id');
    }

    public function customerPayments()
    {
        return $this->hasMany(CustomerPayment::class, 'customer_id');
    }

    public function customerUsages()
    {
        return $this->hasMany(CustomerUsage::class, 'customer_id'); 
    }
}
