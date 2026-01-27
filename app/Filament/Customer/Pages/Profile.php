<?php

namespace App\Filament\Customer\Pages;

use BackedEnum;
use Filament\Pages\Page;
use Filament\Forms\Form;
use Filament\Actions\Action;
use Illuminate\Support\Facades\Hash;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;

class Profile extends Page implements HasForms
{
    use InteractsWithForms;
    
    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-user-circle';
    
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
        ]);
    }
    
    protected function getFormSchema(): array
    {
        return [
            FileUpload::make('avatar')
                ->label('Avatar')
                ->image()
                ->avatar()
                ->directory('avatars')
                ->maxSize(1024),
                
            TextInput::make('name')
                ->label('Name')
                ->required()
                ->maxLength(255),
                
            TextInput::make('email')
                ->label('Email')
                ->email()
                ->required()
                ->maxLength(255),
                
            TextInput::make('current_password')
                ->label('Current Password')
                ->password()
                ->dehydrated(false)
                ->currentPassword(),
                
            TextInput::make('password')
                ->label('New Password')
                ->password()
                ->dehydrated(fn ($state) => filled($state))
                ->confirmed()
                ->minLength(8)
                ->helperText('Leave blank if you don\'t want to change password'),
                
            TextInput::make('password_confirmation')
                ->label('Confirm New Password')
                ->password()
                ->dehydrated(false),
        ];
    }
    
    protected function getFormStatePath(): string
    {
        return 'data';
    }
    
    protected function getFormActions(): array
    {
        return [
            Action::make('save')
                ->label('Update Profile')
                ->submit('save'),
        ];
    }
    
    public function save(): void
    {
        $data = $this->form->getState();
        
        $user = auth()->user();
        
        if (filled($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        } else {
            unset($data['password']);
        }
        
        unset($data['current_password'], $data['password_confirmation']);
        
        $user->update($data);
        
        Notification::make()
            ->success()
            ->title('Profile updated successfully')
            ->send();
    }
}