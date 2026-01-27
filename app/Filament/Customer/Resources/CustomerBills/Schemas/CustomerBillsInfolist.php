<?php

namespace App\Filament\Customer\Resources\CustomerBills\Schemas;

use Filament\Schemas\Schema;
use Filament\Infolists\Components\TextEntry;

class CustomerBillsInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('bill_id')
                    ->label('ID Tagihan')
                    ->copyable()
                    ->copyMessage('ID Tagihan berhasil disalin'),
                TextEntry::make('customer.name')
                    ->label('Nama Pelanggan')
                    ->numeric(),
                TextEntry::make('customer.customer_id')
                    ->label('No kWh')
                    ->copyable()
                    ->copyMessage('No kWh berhasil disalin'),
                TextEntry::make('month')
                    ->label('Bulan Pembayaran'),
                TextEntry::make('year')
                    ->label('Tahun Pembayaran'),
                TextEntry::make('total_meter')
                    ->label('Pemakaian Meter')
                    ->badge()
                    ->icon('heroicon-o-bolt')
                    ->suffix(' kWh')
                    ->numeric(),
                TextEntry::make('customerUsage.start_meter')
                    ->label('Meter Awal')
                    ->badge()
                    ->icon('heroicon-o-bolt')
                    ->suffix(' kWh')
                    ->numeric(),
                TextEntry::make('customerUsage.end_meter')
                    ->label('Meter Akhir')
                    ->badge()
                    ->icon('heroicon-o-bolt')
                    ->suffix(' kWh')
                    ->numeric(),
                TextEntry::make('status')
                    ->label('Status Tagihan')
                    ->color(fn($state): string => match ($state) {
                        'paid' => 'success',
                        'unpaid' => 'danger',
                        default => 'warning',
                    })
                    ->icon(fn($state): string => match ($state) {
                        'paid' => 'heroicon-o-check-circle',
                        'unpaid' => 'heroicon-o-x-circle',
                        default => 'heroicon-o-exclamation-circle',
                    })
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
