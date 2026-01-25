<?php

namespace App\Filament\Resources\CustomerUsages\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class CustomerUsageForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('customer_id')
                    ->required()
                    ->numeric(),
                TextInput::make('month')
                    ->required(),
                TextInput::make('year')
                    ->required()
                    ->numeric(),
                TextInput::make('start_meter')
                    ->required()
                    ->numeric(),
                TextInput::make('end_meter')
                    ->required()
                    ->numeric(),
            ]);
    }
}
