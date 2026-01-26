<?php

namespace App\Filament\Resources\Users\Schemas;

use Illuminate\Support\Str;
use Filament\Actions\Action;
use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('Nama Pengguna')
                    ->placeholder('Nama Pengguna')
                    ->required(),
                TextInput::make('email')
                    ->label('Alamat Email')
                    ->placeholder('Alamat Email')
                    ->email()
                    ->required(),
                Select::make('roles.name')
                    ->label('Role Pengguna')
                    ->native(false)
                    ->relationship('roles', 'name')
                    ->required(),
                TextInput::make('password')
                    ->minLength(8)
                    ->maxLength(255)
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
                            })
                    ),
            ]);
    }
}
