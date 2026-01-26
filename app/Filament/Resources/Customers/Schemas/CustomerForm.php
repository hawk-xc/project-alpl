<?php

namespace App\Filament\Resources\Customers\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class CustomerForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('tariff_id')
                    ->relationship(name: 'customerTariff', titleAttribute: 'power')
                    ->native(false)
                    ->required(),
                TextInput::make('name')
                    ->label('Nama Pengguna')
                    ->required(),
                TextInput::make('username')
                    ->label('Username')
                    ->unique(table: 'customers', column: 'username')
                    ->required(),
                TextInput::make('password')
                    ->label('Kata Sandi')
                    ->password()
                    ->required(),
                Textarea::make('address')
                    ->label('Alamat')
                    ->required()
                    ->columnSpanFull(),
            ]);
    }
}
