<?php

namespace App\Filament\Resources\CustomerBills\Schemas;

use Illuminate\Support\Str;
use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;

class CustomerBillForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([
            TextInput::make('bill_id')->label('Id Tagihan')->required()->readOnly()->dehydrated()->prefixIcon('heroicon-o-tag')->hintIcon('heroicon-o-information-circle', 'Id Tagihan dibuat otomatis')->default(fn() => self::generateUniqueBillId()),
            Select::make('customer_id')
                ->relationship(name: 'customer', titleAttribute: 'name')
                ->required()
                ->prefixIcon('heroicon-o-user')
                ->native(false)
                ->label('Nama Pelanggan')
                ->placeholder('ID Pelanggan'),
            Select::make('customer_usage_id')
                ->relationship(name: 'customerUsage', titleAttribute: 'id')
                ->placeholder('ID Penggunaan')
                ->label('ID Penggunaan')
                ->native(false)
                ->required(),
            Select::make('month')
                ->options([
                    'January' => 'January',
                    'February' => 'February',
                    'March' => 'March',
                    'April' => 'April',
                    'May' => 'May',
                    'June' => 'June',
                    'July' => 'July',
                    'August' => 'August',
                    'September' => 'September',
                    'October' => 'October',
                    'November' => 'November',
                    'December' => 'December',
                ])
                ->native(false)
                ->label('Bulan')
                ->placeholder('Bulan')
                ->required(),
            TextInput::make('year')
                ->label('Tahun')
                ->placeholder('Tahun')
                ->required()
                ->numeric()
                ->default(date('Y'))
                ->readOnly(),
            TextInput::make('total_meter')
                ->label('Total Meter')
                ->placeholder('Total Meter')
                ->readOnly()
                ->required()
                ->numeric(),
            Select::make('status')
                ->native(false)
                ->options(['pending' => 'Pending', 'paid' => 'Terbayar', 'overdue' => 'Jatuh Tempo'])
                ->default('pending')
                ->required(),
        ]);
    }

    protected static function generateUniqueBillId(): string
    {
        do {
            $random = strtoupper(Str::random(10));
            $billId = 'EL-' . $random;
        } while (\App\Models\CustomerBill::where('bill_id', $billId)->exists());

        return $billId;
    }
}
