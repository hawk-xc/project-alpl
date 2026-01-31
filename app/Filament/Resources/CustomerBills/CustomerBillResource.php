<?php

namespace App\Filament\Resources\CustomerBills;

use App\Filament\Resources\CustomerBills\Pages\CreateCustomerBill;
use App\Filament\Resources\CustomerBills\Pages\EditCustomerBill;
use App\Filament\Resources\CustomerBills\Pages\ListCustomerBills;
use App\Filament\Resources\CustomerBills\Pages\ViewCustomerBill;
use App\Filament\Resources\CustomerBills\Schemas\CustomerBillForm;
use App\Filament\Resources\CustomerBills\Schemas\CustomerBillInfolist;
use App\Filament\Resources\CustomerBills\Tables\CustomerBillsTable;
use App\Models\CustomerBill;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class CustomerBillResource extends Resource
{
    protected static ?string $model = CustomerBill::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::Banknotes;

    protected static UnitEnum|string|null $navigationGroup = 'Pelanggan';

    protected static ?int $navigationSort = 4;

    protected static ?string $recordTitleAttribute = 'Tagihan Pelanggan';

    protected static ?string $navigationLabel = 'Tagihan Pelanggan';

    public static function form(Schema $schema): Schema
    {
        return CustomerBillForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return CustomerBillInfolist::configure($schema);
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
            'create' => CreateCustomerBill::route('/create'),
            'view' => ViewCustomerBill::route('/{record}'),
            'edit' => EditCustomerBill::route('/{record}/edit'),
        ];
    }
}
