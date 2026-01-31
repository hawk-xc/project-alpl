<?php

namespace App\Filament\Resources\Permissions\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Permission;

class PermissionsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Permission Name')
                    ->searchable()
                    ->sortable()
                    ->formatStateUsing(fn (string $state): string => Str::headline($state)),
                TextColumn::make('guard_name')
                    ->label('Guard')
                    ->badge()
                    ->searchable()
                    ->sortable(),
                TextColumn::make('roles_display')
                    ->label('Roles')
                    ->getStateUsing(function (Permission $record) {
                        // Ambil role unik yang memiliki permission ini
                        $roles = $record->roles()
                            ->with('users') // supaya bisa langsung akses users
                            ->get()
                            ->unique('id');

                        // Nama role untuk tampilan badge
                        $roleNames = $roles->pluck('name')->map(fn ($n) => Str::limit($n, 15))->toArray();

                        // List user untuk tooltip
                        $userList = $roles
                            ->flatMap(fn ($role) => $role->users->pluck('name')) // kumpulkan semua user dari tiap role
                            ->unique()
                            ->values()
                            ->join(', ');

                        return [
                            'display' => $roleNames ? collect($roleNames)->join(', ') : 'No roles found',
                            // 'tooltip' => $userList ?: 'No users found for these roles',
                        ];
                    })
                    ->formatStateUsing(function ($state) {
                        // Hindari error jika bukan array
                        return is_array($state) ? $state['display'] ?? '' : (string) $state;
                    })
                    ->tooltip(function ($state) {
                        return is_array($state) ? ($state['tooltip'] ?? '') : (string) $state;
                    })
                    ->badge()
                    ->color('info')
                    ->wrap(),

                TextColumn::make('created_at')
                    ->label('Created At')
                    ->dateTime('d M Y H:i')
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
