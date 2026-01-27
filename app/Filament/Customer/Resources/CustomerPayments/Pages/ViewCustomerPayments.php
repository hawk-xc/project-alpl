<?php

namespace App\Filament\Customer\Resources\CustomerPayments\Pages;

use App\Filament\Customer\Resources\CustomerPayments\CustomerPaymentsResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewCustomerPayments extends ViewRecord
{
    protected static string $resource = CustomerPaymentsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // EditAction::make(),
        ];
    }
}
