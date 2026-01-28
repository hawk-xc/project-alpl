<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CustomerPayment extends Model
{
    // Table name information
    protected $table = 'customer_payments';

    // Column Fillable fields
    protected $fillable = [
        'transaction_id',
        'customer_id',
        'customer_bill_id',
        'payment_at',
        'month_paid',
        'admin_fee',
        'total_amount',

        // proof document
        'proof_document',
    ];

    // Relationship
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function customerBill()
    {
        return $this->belongsTo(CustomerBill::class);
    }
}
