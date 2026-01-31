<?php

namespace App\Filament\Resources\CustomerBills\Pages;

use App\Filament\Resources\CustomerBills\CustomerBillResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListCustomerBills extends ListRecords
{
    protected static string $resource = CustomerBillResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // CreateAction::make(),
        ];
    }
}
