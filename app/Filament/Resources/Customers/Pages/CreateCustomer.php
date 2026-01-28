<?php

namespace App\Filament\Resources\Customers\Pages;

use App\Filament\Resources\Customers\CustomerResource;
use Filament\Resources\Pages\CreateRecord;

class CreateCustomer extends CreateRecord
{
    /**
     * The resource class.
     */
    protected static string $resource = CustomerResource::class;

    /**
     * Mutate the form data before creating the record.
     *
     * @param  array<string, mixed>  $data
     * @return array<string, mixed>
     */
    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['password'] = bcrypt($data['password']);

        return $data;
    }

    /**
     * Perform actions after the record has been created.
     *
     * @return void
     */
    protected function afterCreate(): void
    {
        $this->record->assignRole('customer');
    }
}
