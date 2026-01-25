<?php

namespace App\Filament\Resources\CustomerBills\Pages;

use App\Filament\Resources\CustomerBills\CustomerBillResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewCustomerBill extends ViewRecord
{
    protected static string $resource = CustomerBillResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
