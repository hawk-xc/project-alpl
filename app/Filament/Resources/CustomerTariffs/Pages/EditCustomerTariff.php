<?php

namespace App\Filament\Resources\CustomerTariffs\Pages;

use App\Filament\Resources\CustomerTariffs\CustomerTariffResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditCustomerTariff extends EditRecord
{
    protected static string $resource = CustomerTariffResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
