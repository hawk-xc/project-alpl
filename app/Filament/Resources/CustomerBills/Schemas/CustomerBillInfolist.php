<?php

namespace App\Filament\Resources\CustomerBills\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class CustomerBillInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('bill_id'),
                TextEntry::make('customer_id')
                    ->numeric(),
                TextEntry::make('customer_usage_id')
                    ->numeric(),
                TextEntry::make('month'),
                TextEntry::make('year')
                    ->numeric(),
                TextEntry::make('total_meter')
                    ->numeric(),
                TextEntry::make('status')
                    ->badge(),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
