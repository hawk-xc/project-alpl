<?php

namespace App\Filament\Customer\Resources\CustomerBills;

use App\Filament\Customer\Resources\CustomerBills\Pages\CreateCustomerBills;
use App\Filament\Customer\Resources\CustomerBills\Pages\EditCustomerBills;
use App\Filament\Customer\Resources\CustomerBills\Pages\ListCustomerBills;
use App\Filament\Customer\Resources\CustomerBills\Pages\ViewCustomerBills;
use App\Filament\Customer\Resources\CustomerBills\Schemas\CustomerBillsForm;
use App\Filament\Customer\Resources\CustomerBills\Schemas\CustomerBillsInfolist;
use App\Filament\Customer\Resources\CustomerBills\Tables\CustomerBillsTable;
use App\Models\CustomerBill;
use BackedEnum;
use UnitEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class CustomerBillsResource extends Resource
{
    protected static ?string $model = CustomerBill::class;

    protected static UnitEnum|string|null $navigationGroup = 'Pelanggan';
    
    protected static ?string $title = 'Tagihan Pelanggan';

    protected static ?int $navigationSort = 2;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::Banknotes;

    protected static ?string $recordTitleAttribute = 'Tagihan Pelanggan';

    protected static ?string $navigationLabel = 'Tagihan Pelanggan';

    public static function form(Schema $schema): Schema
    {
        return CustomerBillsForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return CustomerBillsInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return CustomerBillsTable::configure($table);
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
            'index' => ListCustomerBills::route('/'),
            'create' => CreateCustomerBills::route('/create'),
            'view' => ViewCustomerBills::route('/{record}'),
            'edit' => EditCustomerBills::route('/{record}/edit'),
        ];
    }
}
