<?php

namespace App\Filament\Resources\Roles\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;

class RolesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Role Name')
                    ->searchable()
                    ->getStateUsing(fn (Role $record): string => Str::upper($record->name))
                    ->sortable(),

                TextColumn::make('created_at')
                    ->label('Created At')
                    ->getStateUsing(fn (Role $record): string => $record->created_at->diffForHumans()),

                TextColumn::make('permissions_count')
                    ->label('Total Permissions')
                    ->badge(),

                TextColumn::make('users.name')
                    ->label('Users')
                    ->getStateUsing(fn (Role $record) => $record->users->pluck('name')->toArray())
                    ->formatStateUsing(function ($state) {
                        return collect($state)->map(fn ($name) => "👤 {$name}")->join(', ');
                    })
                    ->badge()
                    ->wrap()
                    ->searchable()
                    ->limitList(5),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
