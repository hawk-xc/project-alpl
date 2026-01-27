<x-filament-panels::page>
    <form wire:submit="save">
        {{ $this->form }}
        
        <div class="flex justify-end mt-6">
            <x-filament::button type="submit">
                Update Profile
            </x-filament::button>
        </div>
    </form>
</x-filament-panels::page>