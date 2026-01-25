<?php

namespace App\Filament\Resources\CustomerUsages;

use App\Filament\Resources\CustomerUsages\Pages\CreateCustomerUsage;
use App\Filament\Resources\CustomerUsages\Pages\EditCustomerUsage;
use App\Filament\Resources\CustomerUsages\Pages\ListCustomerUsages;
use App\Filament\Resources\CustomerUsages\Pages\ViewCustomerUsage;
use App\Filament\Resources\CustomerUsages\Schemas\CustomerUsageForm;
use App\Filament\Resources\CustomerUsages\Schemas\CustomerUsageInfolist;
use App\Filament\Resources\CustomerUsages\Tables\CustomerUsagesTable;
use App\Models\CustomerUsage;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use BackedEnum;
use UnitEnum;

class CustomerUsageResource extends Resource
{
    protected static ?string $model = CustomerUsage::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::LightBulb;

    protected static ?string $recordTitleAttribute = 'Penggunaan Listrik';

    protected static UnitEnum|string|null $navigationGroup = 'Pelanggan';

    protected static ?int $navigationSort = 5;

    protected static ?string $navigationLabel = 'Penggunaan Listrik';

    public static function form(Schema $schema): Schema
    {
        return CustomerUsageForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return CustomerUsageInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return CustomerUsagesTable::configure($table);
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
            'index' => ListCustomerUsages::route('/'),
            'create' => CreateCustomerUsage::route('/create'),
            'view' => ViewCustomerUsage::route('/{record}'),
            'edit' => EditCustomerUsage::route('/{record}/edit'),
        ];
    }
}
