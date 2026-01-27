<?php

namespace App\Filament\Customer\Pages;

use BackedEnum;
use UnitEnum;
use Filament\Forms\Form;
use Filament\Pages\Page;
use Filament\Actions\Action;
use Illuminate\Support\Facades\Hash;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Concerns\InteractsWithForms;

class Profile extends Page implements HasForms
{
    use InteractsWithForms;
    
    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-user-circle';

    protected static UnitEnum|string|null $navigationGroup = 'Informasi Pengguna';
    
    protected static ?int $navigationSort = 4;
    
    public string $view = 'filament.customer.pages.profile';
    
    protected static ?string $navigationLabel = 'Data Pelanggan';
    
    protected static ?string $title = 'Data Pelanggan';
    
    protected static bool $shouldRegisterNavigation = true;
    
    public ?array $data = [];
    
    public function mount(): void
    {
        $this->form->fill([
            'name' => auth()->user()->name,
            'email' => auth()->user()->email,
            'username' => auth()->user()->username,
            'created_at' => auth()->user()->created_at,
            'address' => auth()->user()->address,
            // tariff
            'customerTariffPower' => auth()->user()->customerTariff->power,
            'customerTotalMeterPower' => auth()->user()->total_usage_meter,
        ]);
    }
    
    protected function getFormSchema(): array
    {
        return [
            Section::make('Informasi Pengguna')->schema([
                TextInput::make('name')
                    ->label('Name')
                    ->readOnly()
                    ->maxLength(255)
                    ->columnSpan(1),
                    
                TextInput::make('email')
                    ->label('Email')
                    ->email()
                    ->readOnly()
                    ->maxLength(255)
                    ->columnSpan(1),

                TextInput::make('username')
                    ->label('Username')
                    ->readOnly()
                    ->maxLength(255)
                    ->columnSpan(1),

                TextInput::make('created_at')
                    ->label('Tanggal Bergabung')
                    ->readOnly()
                    ->maxLength(255)
                    ->columnSpan(1),

                TextInput::make('address')
                    ->label('Alamat')
                    ->readOnly()
                    ->maxLength(255)
                    ->columnSpanFull(),
            ])->columns(2),
            Section::make('Informasi Akun Pengguna')->schema([
                TextInput::make('customerTariffPower')
                    ->label('Daya')
                    ->prefixIcon('heroicon-o-bolt')
                    ->readOnly()
                    ->maxLength(255)
                    ->columnSpan(1),

                TextInput::make('customerTotalMeterPower')
                    ->label('Penggunaan Total Meter')
                    ->prefixIcon('heroicon-o-bolt')
                    ->readOnly()
                    ->suffix('kWh')
                    ->maxLength(255)
                    ->columnSpan(1),
            ])->columns(2),
        ];
    }   
    
    protected function getFormStatePath(): string
    {
        return 'data';
    }

    protected function getFormActions(): array
    {
        return [];
    }
}