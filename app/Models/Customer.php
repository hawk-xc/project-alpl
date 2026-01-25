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
    public function tariff()
    {
        return $this->belongsTo(CustomerTariff::class, 'tariff_id');
    }
}
