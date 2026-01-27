<?php

namespace App\Filament\Customer\Resources\CustomerBills\Pages;

use App\Filament\Customer\Resources\CustomerBills\CustomerBillsResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditCustomerBills extends EditRecord
{
    protected static string $resource = CustomerBillsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
