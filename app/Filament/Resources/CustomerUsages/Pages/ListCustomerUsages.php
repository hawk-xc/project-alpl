<?php

namespace App\Filament\Resources\CustomerUsages\Pages;

use App\Filament\Resources\CustomerUsages\CustomerUsageResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListCustomerUsages extends ListRecords
{
    protected static string $resource = CustomerUsageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
