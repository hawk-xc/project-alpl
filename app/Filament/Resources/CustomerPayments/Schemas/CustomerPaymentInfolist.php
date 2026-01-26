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
                    ->label('ID Invoice'),
                TextEntry::make('customer.name')
                    ->label('Nama Pelanggan'),
                TextEntry::make('customerBill.bill_id')
                    ->label('ID Tagihan')
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
            ]);
    }
}
