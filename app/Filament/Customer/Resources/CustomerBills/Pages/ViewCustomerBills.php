<?php

namespace App\Filament\Customer\Resources\CustomerBills\Pages;

use App\Filament\Customer\Resources\CustomerBills\CustomerBillsResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewCustomerBills extends ViewRecord
{
    protected static string $resource = CustomerBillsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
