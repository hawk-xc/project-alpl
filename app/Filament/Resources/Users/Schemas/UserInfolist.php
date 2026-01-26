<?php

namespace App\Filament\Resources\Users\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class UserInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('name')
                    ->label('Nama Pengguna'),
                TextEntry::make('roles.name')
                    ->label('Role Pengguna')
                    ->badge(),
                TextEntry::make('email')
                    ->label('Email Pengguna'),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->label('Ditambahkan Pada')
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->label('Diperbahrui Pada')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
