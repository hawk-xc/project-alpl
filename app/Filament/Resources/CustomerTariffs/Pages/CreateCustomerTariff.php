<?php

namespace App\Filament\Resources\CustomerTariffs\Pages;

use App\Filament\Resources\CustomerTariffs\CustomerTariffResource;
use Filament\Resources\Pages\CreateRecord;

class CreateCustomerTariff extends CreateRecord
{
    protected static string $resource = CustomerTariffResource::class;
}
