<?php

namespace App\Filament\Resources\CustomerPayments\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class CustomerPaymentsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('transaction_id')
                    ->label('Invoice Transaksi')
                    ->searchable(),
                TextColumn::make('customerBill.bill_id')
                    ->searchable()
                    ->label('Nama Tagihan')
                    ->sortable(),
                TextColumn::make('customer.name')
                    ->label('Nama Pelanggan')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('customerBill.month')
                    ->label('Bulan')
                    ->sortable(),
                TextColumn::make('admin_fee')
                    ->numeric()
                    ->prefix('Rp. ')
                    ->label('Biaya Admin')
                    ->sortable(),
                TextColumn::make('total_amount')
                    ->numeric()
                    ->label('Total')
                    ->prefix('Rp. ')
                    ->sortable(),
                TextColumn::make('customerBill.status')
                    ->color(fn (string $state): string => match ($state) {
                        'paid' => 'success',
                        'pending' => 'warning',
                        'overdue' => 'danger',
                        default => 'gray',
                    })
                    ->icon(fn (string $state): string => match ($state) {
                        'paid' => 'heroicon-o-check-circle',
                        'pending' => 'heroicon-o-clock',
                        'overdue' => 'heroicon-o-exclamation-circle',
                        default => 'heroicon-o-circle',
                    })
                    ->badge()
                    ->label('Status Pembayaran'),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->label('Ditambahkan Pada')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->label('Diperbarui Pada')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
