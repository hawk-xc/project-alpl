<?php

namespace App\Filament\Resources\CustomerUsages\Pages;

use App\Filament\Resources\CustomerUsages\CustomerUsageResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditCustomerUsage extends EditRecord
{
    protected static string $resource = CustomerUsageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
