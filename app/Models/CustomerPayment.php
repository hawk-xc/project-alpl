<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CustomerPayment extends Model
{
    protected $table = 'customer_payments';

    protected $fillable = [
        'transaction_id',
        'customer_id',
        'customer_bill_id',
        'payment_at',
        'month_paid',
        'admin_fee',
        'total_amount',
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
