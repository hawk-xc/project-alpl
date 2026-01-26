<?php

namespace App\Filament\Resources\Customers\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class CustomerInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('customerTariff.power')
                    ->numeric()
                    ->badge()
                    ->icon('heroicon-o-bolt'),
                TextEntry::make('name')
                    ->label('Nama Pelanggan'),
                TextEntry::make('username')
                    ->label('Username'),
                TextEntry::make('address')
                    ->label('Alamat')
                    ->columnSpanFull(),
                TextEntry::make('created_at')
                    ->label('Ditambahkan Pada')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->label('Diperbahrui Pada')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
