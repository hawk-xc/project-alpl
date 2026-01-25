<?php

namespace App\Filament\Resources\CustomerUsages\Pages;

use App\Filament\Resources\CustomerUsages\CustomerUsageResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewCustomerUsage extends ViewRecord
{
    protected static string $resource = CustomerUsageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
