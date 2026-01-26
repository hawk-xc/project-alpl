<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CustomerUsage extends Model
{
    protected $table = 'customer_usages';

    protected $fillable = [
        'customer_id',
        'month',
        'year',
        'start_meter',
        'end_meter',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function customerBill()
    {
        return $this->belongsTo(CustomerBill::class);
    }
}
