<?php

namespace App\Filament\Resources\CustomerPayments\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DateTimePicker;
use App\Models\CustomerPayment;
use Carbon\Carbon;

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
                ->relationship(name: 'customer', titleAttribute: 'name')
                ->prefixIcon('heroicon-o-user')
                ->native(false)->label('ID Pelanggan')
                ->placeholder('ID Pelanggan')
                ->required(),
            Select::make('customer_bill_id')
                ->relationship(name: 'customerBill', titleAttribute: 'bill_id')
                ->native(false)
                ->prefixIcon('heroicon-o-banknotes')
                ->label('ID Tagihan')
                ->placeholder('ID Tagihan')
                ->required(),
            DateTimePicker::make('payment_at')
                ->prefixIcon('heroicon-o-calendar')
                ->label('Tanggal Pembayaran')
                ->placeholder('Tanggal Pembayaran')
                ->native(false)
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
            TextInput::make('total_amount')->label('Total')->placeholder('Total')->required()->prefix('Rp. ')->numeric(),
        ]);
    }
}
