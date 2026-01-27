<?php

namespace App\Filament\Customer\Resources\CustomerPayments\Schemas;

use Carbon\Carbon;
use Filament\Schemas\Schema;
use App\Models\CustomerPayment;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DateTimePicker;
use Filament\Schemas\Components\Utilities\Get;

class CustomerPaymentsForm
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
            TextInput::make('customer_id')
                ->default(auth()->user()->name)
                ->readOnly()
                ->required(),

            Select::make('customer_bill_id')
                ->label('ID Tagihan')
                ->relationship(
                    name: 'customerBill',
                    titleAttribute: 'bill_id',
                    modifyQueryUsing: fn($query) =>
                    $query->where('customer_id', auth()->user()->id)->where('status', '!=', 'paid')
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
            TextInput::make('admin_fee')->default(3000)->readOnly()->label('Biaya Admin')->placeholder('Biaya Admin')->prefix('Rp. ')->numeric(),
        ]);
    }
}
