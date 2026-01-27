<?php

namespace App\Filament\Customer\Resources\CustomerBills\Pages;

use App\Filament\Customer\Resources\CustomerBills\CustomerBillsResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListCustomerBills extends ListRecords
{
    protected static string $resource = CustomerBillsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
