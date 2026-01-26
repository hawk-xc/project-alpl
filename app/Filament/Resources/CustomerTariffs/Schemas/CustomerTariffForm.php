<?php

namespace App\Filament\Resources\CustomerTariffs\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class CustomerTariffForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('power')
                    ->required()
                    ->label('Daya')
                    ->numeric()
                    ->default(1),
                TextInput::make('price_in_kwh')
                    ->required()
                    ->label('Harga Daya/kWh')
                    ->numeric()
                    ->default(1),
            ]);
    }
}
