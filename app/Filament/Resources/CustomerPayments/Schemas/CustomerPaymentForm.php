<?php

namespace App\Filament\Resources\CustomerPayments\Schemas;

use Carbon\Carbon;
use Filament\Schemas\Schema;
use App\Models\CustomerPayment;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DateTimePicker;
use Filament\Schemas\Components\Utilities\Get;

class CustomerPaymentForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([
            TextInput::make('transaction_id')
                ->label('Invoice Transaksi')
                ->placeholder('Invoice Transaksi')
                ->required()
                ->dehydrated()
                ->prefixIcon('heroicon-o-tag')
                ->readOnly()
                ->hintIcon('heroicon-o-information-circle', 'Invoice Dibuat Otomatis')
                ->default(function () {
                    $date = Carbon::now()->format('Ymd');

                    $lastInvoice = CustomerPayment::whereDate('created_at', today())
                        ->where('transaction_id', 'like', "INV-$date%")
                        ->orderBy('transaction_id', 'desc')
                        ->value('transaction_id');

                    $number = $lastInvoice ? ((int) substr($lastInvoice, -3)) + 1 : 1;

                    return 'INV-' . $date . str_pad($number, 3, '0', STR_PAD_LEFT);
                }),
            Select::make('customer_id')
                ->relationship('customer', 'name')
                ->native(false)
                ->required()
                ->afterStateUpdated(fn($set) => $set('customer_bill_id', null))
                ->reactive(),

            Select::make('customer_bill_id')
                ->label('ID Tagihan')
                ->relationship(
                    name: 'customerBill',
                    titleAttribute: 'bill_id',
                    modifyQueryUsing: fn($query, Get $get) =>
                    $query->when(
                        $get('customer_id'),
                        fn($q) => $q->where('customer_id', $get('customer_id'))
                    )
                )
                ->native(false)
                ->required()
                ->prefixIcon('heroicon-o-banknotes')
                ->placeholder('Pilih tagihan sesuai pelanggan'),
            DateTimePicker::make('payment_at')
                ->prefixIcon('heroicon-o-calendar')
                ->label('Tanggal Pembayaran')
                ->placeholder('Tanggal Pembayaran')
                ->native(false)
                ->default(now())
                ->required(),
            Select::make('month_paid')
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
                ->label('Bulan Tagihan')
                ->placeholder('Bulan Tagihan')
                ->required(),
            TextInput::make('admin_fee')->label('Biaya Admin')->placeholder('Biaya Admin')->prefix('Rp. ')->numeric(),
        ]);
    }
}
