<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CustomerTariff extends Model
{
    protected $table = 'customer_tariffs';

    protected $fillable = [
        'power',
        'power_in_kwh',
    ];

    public function customer()
    {
        return $this->hasMany(Customer::class, 'tariff_id');
    }
}
