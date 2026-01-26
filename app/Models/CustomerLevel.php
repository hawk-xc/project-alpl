<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CustomerLevel extends Model
{
    protected $table = 'customer_levels';

    protected $fillable = [
        'name',
    ];
}
