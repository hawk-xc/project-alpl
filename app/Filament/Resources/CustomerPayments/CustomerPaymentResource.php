<?php

namespace App\Filament\Resources\CustomerPayments;

use App\Filament\Resources\CustomerPayments\Pages\CreateCustomerPayment;
use App\Filament\Resources\CustomerPayments\Pages\EditCustomerPayment;
use App\Filament\Resources\CustomerPayments\Pages\ListCustomerPayments;
use App\Filament\Resources\CustomerPayments\Pages\ViewCustomerPayment;
use App\Filament\Resources\CustomerPayments\Schemas\CustomerPaymentForm;
use App\Filament\Resources\CustomerPayments\Schemas\CustomerPaymentInfolist;
use App\Filament\Resources\CustomerPayments\Tables\CustomerPaymentsTable;
use App\Models\CustomerPayment;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class CustomerPaymentResource extends Resource
{
    protected static ?string $model = CustomerPayment::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::CreditCard;

    protected static UnitEnum|string|null $navigationGroup = 'Pelanggan';

    protected static ?int $navigationSort = 3;

    protected static ?string $recordTitleAttribute = 'Pembayaran Pelanggan';

    protected static ?string $navigationLabel = 'Pembayaran Pelanggan';

    public static function form(Schema $schema): Schema
    {
        return CustomerPaymentForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return CustomerPaymentInfolist::configure($schema);
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
            'create' => CreateCustomerPayment::route('/create'),
            'view' => ViewCustomerPayment::route('/{record}'),
            'edit' => EditCustomerPayment::route('/{record}/edit'),
        ];
    }
}
