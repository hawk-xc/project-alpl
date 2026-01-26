<?php

namespace App\Filament\Resources\CustomerBills\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class CustomerBillInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('bill_id'),
                TextEntry::make('customer.name')
                    ->label('Pelanggan')
                    ->icon('heroicon-o-user')
                    ->numeric(),
                TextEntry::make('customerUsage.id')
                    ->label('ID Penggunaan')
                    ->icon('heroicon-o-document-text')
                    ->numeric(),
                TextEntry::make('month')
                ->label('Bulan Pembayaran'),
                TextEntry::make('year')
                    ->label('Tahun Pembayaran'),
                TextEntry::make('total_meter')
                ->label('Total Meter')
                    ->numeric(),
                TextEntry::make('status')
                    ->label('Status Tagihan')
                    ->badge(),
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
