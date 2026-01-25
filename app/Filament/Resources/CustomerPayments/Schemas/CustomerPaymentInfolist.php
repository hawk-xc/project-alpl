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
                TextEntry::make('transaction_id'),
                TextEntry::make('customer_id')
                    ->numeric(),
                TextEntry::make('customer_bill_id')
                    ->numeric(),
                TextEntry::make('payment_at')
                    ->dateTime(),
                TextEntry::make('month_paid'),
                TextEntry::make('admin_fee')
                    ->numeric(),
                TextEntry::make('total_amount')
                    ->numeric(),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
