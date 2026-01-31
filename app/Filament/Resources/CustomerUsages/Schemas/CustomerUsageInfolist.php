<?php

namespace App\Filament\Resources\CustomerUsages\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class CustomerUsageInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('customer.name')
                    ->icon('heroicon-o-user')
                    ->label('Pelanggan'),
                TextEntry::make('month')
                    ->icon('heroicon-o-calendar')
                    ->label('Bulan'),
                TextEntry::make('year')
                    ->icon('heroicon-o-calendar')
                    ->label('Tahun'),
                TextEntry::make('start_meter')
                    ->label('Meter Awal'),
                TextEntry::make('end_meter')
                    ->label('Meter Akhir'),
                TextEntry::make('created_at')
                    ->label('Ditambahkan Pada')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->label('Diperbarui Pada')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
