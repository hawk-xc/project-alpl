<?php

namespace App\Filament\Customer\Resources\CustomerPayments;

use App\Filament\Customer\Resources\CustomerPayments\Pages\CreateCustomerPayments;
use App\Filament\Customer\Resources\CustomerPayments\Pages\EditCustomerPayments;
use App\Filament\Customer\Resources\CustomerPayments\Pages\ListCustomerPayments;
use App\Filament\Customer\Resources\CustomerPayments\Pages\ViewCustomerPayments;
use App\Filament\Customer\Resources\CustomerPayments\Schemas\CustomerPaymentsForm;
use App\Filament\Customer\Resources\CustomerPayments\Schemas\CustomerPaymentsInfolist;
use App\Filament\Customer\Resources\CustomerPayments\Tables\CustomerPaymentsTable;
use App\Models\CustomerPayment;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class CustomerPaymentsResource extends Resource
{
    protected static ?string $model = CustomerPayment::class;

    protected static UnitEnum|string|null $navigationGroup = 'Pelanggan';

    protected static ?string $title = 'Pembayaran Saya';

    protected static ?int $navigationSort = 3;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::CreditCard;

    protected static ?string $recordTitleAttribute = 'Pembayaran Saya';

    protected static ?string $navigationLabel = 'Pembayaran Saya';

    public static function form(Schema $schema): Schema
    {
        return CustomerPaymentsForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return CustomerPaymentsInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return CustomerPaymentsTable::configure($table);
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
            'index' => ListCustomerPayments::route('/'),
            'create' => CreateCustomerPayments::route('/create'),
            'view' => ViewCustomerPayments::route('/{record}'),
            'edit' => EditCustomerPayments::route('/{record}/edit'),
        ];
    }
}
