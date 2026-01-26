<?php

namespace App\Filament\Resources\CustomerUsages\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;

class CustomerUsageForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([
            Select::make('customer_id')
            ->columnSpanFull()
            ->prefixIcon('heroicon-o-user')->relationship('customer', 'name')->native(false)->required(),
            Section::make('Informasi Penggunaan')->schema([
                Select::make('month')
                    ->prefixIcon('heroicon-o-calendar')
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
                TextInput::make('year')->label('Tahun')->placeholder('Tahun')->required()->numeric()->default(date('Y'))->readOnly(),
            ])
            ->columnSpanFull(),
            Section::make('Informasi Penggunaan Daya')->schema([TextInput::make('start_meter')->label('Meter Awal')->placeholder('Meter Awal')->required()->numeric(), TextInput::make('end_meter')->label('Meter Akhir')->placeholder('Meter Akhir')->required()->numeric()])
            ->columnSpanFull(),
        ]);
    }
}
