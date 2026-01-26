<?php

namespace App\Filament\Resources\CustomerBills\Pages;

use Filament\Actions\CreateAction;
use Filament\Actions\BulkActionGroup;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Resources\CustomerBills\CustomerBillResource;

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
