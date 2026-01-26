<?php

namespace App\Filament\Resources\CustomerPayments\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class CustomerPaymentInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('transaction_id')
                    ->label('ID Invoice')
                    ->copyable()
                    ->copyMessage('ID Invoice berhasil disalin'),
                TextEntry::make('customer.name')
                    ->label('Nama Pelanggan'),
                TextEntry::make('customerBill.bill_id')
                    ->label('ID Tagihan')
                    ->copyable()
                    ->copyMessage('ID Tagihan berhasil disalin')
                    ->numeric(),
                TextEntry::make('payment_at')
                    ->label('Tanggal Dibayar')
                    ->dateTime(),
                TextEntry::make('month_paid')
                    ->label('Bulan Dibayar'),
                TextEntry::make('admin_fee')
                    ->label('Biaya Admin')
                    ->prefix('Rp. ')
                    ->numeric(),
                TextEntry::make('customerBill.total_meter')
                    ->label('Total Meter')
                    ->badge()
                    ->suffix(' kWh')
                    ->icon('heroicon-o-bolt')
                    ->numeric(),
                TextEntry::make('customerBill.month')
                    ->label('Bulan Tagihan')
                    ->numeric(),
                TextEntry::make('total_amount')
                    ->label('Total Dibayar')
                    ->prefix('Rp. ')
                    ->numeric(),
                TextEntry::make('created_at')
                    ->label('Ditambahkan Pada')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->label('Diperbarui Pada')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('customerBill.status')
                    ->label('Status')
                    ->badge()
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
                    ->placeholder('-'),
            ]);
    }
}
