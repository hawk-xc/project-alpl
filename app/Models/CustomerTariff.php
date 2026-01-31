<?php

namespace App\Models;

use Illuminate\Support\Facades\Log;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CustomerTariff extends Model
{
    use HasFactory;

    protected $table = 'customer_tariffs';

    protected $fillable = ['power', 'power_in_kwh'];

    public function customer()
    {
        return $this->hasMany(Customer::class, 'tariff_id');
    }

    public function getCustomerCountsAttribute()
    {
        // get Memmory Allocation usage
        $startMemory = memory_get_usage();

        // execution time (microtime)
        $start = microtime(true);
        $customerCount = $this->customer()->count();
        $end = microtime(true);

        $endMemory = memory_get_usage();
        $execution_time = $end - $start;
        $memory_usage = $endMemory - $startMemory;

        Log::info('Execution time: ' . $execution_time);
        Log::info('Memmory Allocation : ' . $memory_usage);

        return $customerCount;
    }
}
