<?php

namespace App\Filament\Resources\CustomerTariffs;

use App\Filament\Resources\CustomerTariffs\Pages\CreateCustomerTariff;
use App\Filament\Resources\CustomerTariffs\Pages\EditCustomerTariff;
use App\Filament\Resources\CustomerTariffs\Pages\ListCustomerTariffs;
use App\Filament\Resources\CustomerTariffs\Schemas\CustomerTariffForm;
use App\Filament\Resources\CustomerTariffs\Tables\CustomerTariffsTable;
use App\Models\CustomerTariff;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use BackedEnum;
use UnitEnum;

class CustomerTariffResource extends Resource
{
    protected static ?string $model = CustomerTariff::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::Bolt;

    protected static ?string $recordTitleAttribute = 'Tarif Pelanggan';

    protected static ?string $navigationLabel = 'Tarif Pelanggan';

    protected static UnitEnum|string|null $navigationGroup = 'Tarif';

    protected static ?int $navigationSort = 6;

    public static function form(Schema $schema): Schema
    {
        return CustomerTariffForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return CustomerTariffsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListCustomerTariffs::route('/'),
            'create' => CreateCustomerTariff::route('/create'),
            'edit' => EditCustomerTariff::route('/{record}/edit'),
        ];
    }
}
