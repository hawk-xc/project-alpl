<?php

namespace App\Filament\Resources\CustomerUsages\Pages;

use App\Filament\Resources\CustomerUsages\CustomerUsageResource;
use Filament\Resources\Pages\CreateRecord;

class CreateCustomerUsage extends CreateRecord
{
    protected static string $resource = CustomerUsageResource::class;
}
