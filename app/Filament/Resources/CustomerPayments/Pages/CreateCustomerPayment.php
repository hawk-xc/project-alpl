<?php

namespace App\Filament\Resources\CustomerPayments\Pages;

use App\Models\Customer;
use App\Models\CustomerBill;
use Filament\Resources\Pages\CreateRecord;
use App\Filament\Resources\CustomerPayments\CustomerPaymentResource;

class CreateCustomerPayment extends CreateRecord
{
    protected static string $resource = CustomerPaymentResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $customerBill = CustomerBill::with('customer.customerTariff')->find($data['customer_bill_id']);

        $data['total_amount'] = $customerBill->customer->customerTariff->price_in_kwh * $customerBill->total_meter + $data['admin_fee'];

        return $data;
    }
}
