<?php

namespace App\Filament\Resources\Customers\Schemas;

use Illuminate\Support\Str;
use Filament\Actions\Action;
use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;

class CustomerForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([
            Select::make('tariff_id')->relationship(name: 'customerTariff', titleAttribute: 'power')->native(false)->placeholder('Pilih Tarif')->required(),
            TextInput::make('name')->label('Nama Pengguna')->placeholder('Nama Pengguna')->required(),
            TextInput::make('username')->label('Username')->placeholder('Username')->unique(table: 'customers', column: 'username')->required(),
            TextInput::make('password')
                ->label('Kata Sandi')
                ->placeholder('Kata Sandi')
                ->password()
                ->required()
                ->revealable()
                ->prefixAction(
                    Action::make('generatePassword')
                        ->icon('heroicon-o-arrow-path-rounded-square')
                        ->tooltip('Buat kata sandi acak')
                        ->action(function (callable $set) {
                            $set('password', Str::random(8));
                        }),
                ),
            Textarea::make('address')->label('Alamat')->placeholder('Alamat')->required()->columnSpanFull(),
        ]);
    }
}
