<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
// use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Customer extends Authenticatable
{
    use HasRoles, Notifiable;

    protected $guard_name = 'customer';

    protected $fillable = ['tariff_id', 'customer_id', 'email', 'name', 'username', 'address', 'password'];

    protected $hidden = ['password', 'remember_token'];

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

    public function getTotalUsageMeterAttribute()
    {
        return DB::selectOne('SELECT fn_sum_customer_usage_meter_total(?) AS total', [$this->id])->total ?? 0;
    }

    public function scopeWithTotalMeterUsage($query)
    {
        return $query->select('*')->selectRaw('fn_sum_customer_usage_meter_total(customers.id) AS total_usage_meter');
    }
}
