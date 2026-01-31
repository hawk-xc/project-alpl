<?php

namespace App\Filament\Resources\Customers;

use App\Filament\Resources\Customers\Pages\CreateCustomer;
use App\Filament\Resources\Customers\Pages\EditCustomer;
use App\Filament\Resources\Customers\Pages\ListCustomers;
use App\Filament\Resources\Customers\Pages\ViewCustomer;
use App\Filament\Resources\Customers\Schemas\CustomerForm;
use Illuminate\Support\Facades\Gate;
use App\Filament\Resources\Customers\Schemas\CustomerInfolist;
use App\Filament\Resources\Customers\Tables\CustomersTable;
use App\Models\Customer;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use UnitEnum;

class CustomerResource extends Resource
{
    protected static string $name = 'customers';

    /**
     * The model class.
     */
    protected static ?string $model = Customer::class;

    /**
     * The navigation icon.
     */
    protected static string|BackedEnum|null $navigationIcon = Heroicon::UserGroup;

    /**
     * The navigation group.
     */
    protected static UnitEnum|string|null $navigationGroup = 'Pelanggan';

    /**
     * The record title attribute.
     */
    protected static ?string $recordTitleAttribute = 'Pelanggan';

    /**
     * The navigation label.
     */
    protected static ?string $navigationLabel = 'Pelanggan';

    /**
     * The navigation sort.
     */
    protected static ?int $navigationSort = 2;

    /**
     * Configure the form schema.
     */
    public static function form(Schema $schema): Schema
    {
        return CustomerForm::configure($schema);
    }

    /**
     * Configure the infolist schema.
     */
    public static function infolist(Schema $schema): Schema
    {
        return CustomerInfolist::configure($schema);
    }

    /**
     * Configure the table.
     */
    public static function table(Table $table): Table
    {
        return CustomersTable::configure($table);
    }

    /**
     * Get the relations for the resource.
     */
    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->select([
                'id',
                'tariff_id',
                'customer_id',
                'name',
                'created_at',
                'updated_at',
            ]);
    }

    /**
     * Get the pages for the resource.
     */
    public static function getPages(): array
    {
        return [
            'index' => ListCustomers::route('/'),
            'create' => CreateCustomer::route('/create'),
            'view' => ViewCustomer::route('/{record}'),
            'edit' => EditCustomer::route('/{record}/edit'),
        ];
    }

    // Permission Scope
    public static function canViewAny(): bool
    {
        return Gate::allows(self::$name . ':list');
    }

    public static function canView($record): bool
    {
        return Gate::allows(self::$name . ':list');
    }

    public static function canCreate(): bool
    {
        return Gate::allows(self::$name . ':create');
    }

    public static function canEdit($record): bool
    {
        return Gate::allows(self::$name . ':edit');
    }

    public static function canDelete($record): bool
    {
        return Gate::allows(self::$name . ':delete');
    }

    public static function canForceDelete($record): bool
    {
        return Gate::allows(self::$name . ':delete');
    }

    public static function canRestore($record): bool
    {
        return Gate::allows(self::$name . ':delete');
    }

    // Navigation Visibility
    public static function shouldRegisterNavigation(): bool
    {
        return auth()->user()->can(self::$name . ':list');
    }
}
