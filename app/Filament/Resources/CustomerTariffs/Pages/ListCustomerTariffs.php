<?php

namespace App\Filament\Resources\CustomerTariffs\Pages;

use App\Filament\Resources\CustomerTariffs\CustomerTariffResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListCustomerTariffs extends ListRecords
{
    protected static string $resource = CustomerTariffResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
