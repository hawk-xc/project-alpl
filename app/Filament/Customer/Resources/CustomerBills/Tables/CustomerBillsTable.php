<?php

namespace App\Filament\Customer\Resources\CustomerBills\Tables;

use Filament\Tables\Table;
use Filament\Facades\Filament;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;

class CustomerBillsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->modifyQueryUsing(
                fn(Builder $query) =>
                $query->where('customer_id', Filament::auth()->id())
            )
            ->columns([
                TextColumn::make('bill_id')
                    ->label('ID Tagihan')
                    ->searchable(),
                TextColumn::make('customer.name')
                    ->label('Nama Pelanggan')
                    ->sortable(),
                TextColumn::make('customerUsage.month')
                    ->label('Bulan')
                    ->sortable(),
                TextColumn::make('customerUsage.year')
                    ->label('Tahun')
                    ->sortable(),
                TextColumn::make('total_meter')
                    ->label('Pemakaian Meter')
                    ->suffix(' kWh')
                    ->numeric()
                    ->badge()
                    ->icon('heroicon-o-bolt')
                    ->sortable(),
                TextColumn::make('status')
                    ->label('Status')
                    ->color(fn(string $state): string => match ($state) {
                        'paid' => 'success',
                        'pending' => 'warning',
                        'overdue' => 'danger',
                        default => 'gray',
                    })
                    ->icon(fn(string $state): string => match ($state) {
                        'paid' => 'heroicon-o-check-circle',
                        'pending' => 'heroicon-o-clock',
                        'overdue' => 'heroicon-o-exclamation-circle',
                        default => 'heroicon-o-circle',
                    })
                    ->badge(),
                TextColumn::make('created_at')
                    ->label('Dibuat Pada')
                    ->dateTime()
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
                // EditAction::make(),
            ])
            ->toolbarActions([
                // BulkActionGroup::make([
                //     DeleteBulkAction::make(),
                // ]),
            ]);
    }
}
