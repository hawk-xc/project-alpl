<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class CustomerBill extends Model
{
    protected $table = 'customer_bills';

    protected $fillable = [
        'bill_id',
        'customer_id',
        'customer_usage_id',
        'month',
        'year',
        'total_meter',
        'status',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function customerUsage()
    {
        return $this->belongsTo(CustomerUsage::class);
    }

    public function scopePaidBill(Builder $query)
    {
        return $query->where('status', 'paid');
    }

    public function scopeUnpaidBill(Builder $query)
    {
        return $query->where('status', 'pending');
    }

    public function scopeOverdueBill(Builder $query)
    {
        return $query->where('status', 'overdue');
    }
}
