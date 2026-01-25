<?php

namespace App\Filament\Resources\CustomerPayments\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class CustomerPaymentForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('transaction_id')
                    ->required(),
                TextInput::make('customer_id')
                    ->required()
                    ->numeric(),
                TextInput::make('customer_bill_id')
                    ->required()
                    ->numeric(),
                DateTimePicker::make('payment_at')
                    ->required(),
                TextInput::make('month_paid')
                    ->required(),
                TextInput::make('admin_fee')
                    ->required()
                    ->numeric(),
                TextInput::make('total_amount')
                    ->required()
                    ->numeric(),
            ]);
    }
}
