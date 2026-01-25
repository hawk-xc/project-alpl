<?php

namespace App\Filament\Resources\CustomerBills\Pages;

use App\Filament\Resources\CustomerBills\CustomerBillResource;
use Filament\Resources\Pages\CreateRecord;

class CreateCustomerBill extends CreateRecord
{
    protected static string $resource = CustomerBillResource::class;
}
