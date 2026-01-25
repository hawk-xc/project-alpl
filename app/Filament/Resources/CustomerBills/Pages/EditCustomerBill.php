<?php

namespace App\Filament\Resources\CustomerBills\Pages;

use App\Filament\Resources\CustomerBills\CustomerBillResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditCustomerBill extends EditRecord
{
    protected static string $resource = CustomerBillResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
