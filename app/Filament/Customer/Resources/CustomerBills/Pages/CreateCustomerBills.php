<?php

namespace App\Filament\Customer\Resources\CustomerBills\Pages;

use App\Filament\Customer\Resources\CustomerBills\CustomerBillsResource;
use Filament\Resources\Pages\CreateRecord;

class CreateCustomerBills extends CreateRecord
{
    protected static string $resource = CustomerBillsResource::class;
}
