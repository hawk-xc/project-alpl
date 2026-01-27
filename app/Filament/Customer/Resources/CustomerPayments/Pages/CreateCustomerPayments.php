<?php

namespace App\Filament\Customer\Resources\CustomerPayments\Pages;

use App\Models\CustomerBill;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;
use App\Filament\Customer\Resources\CustomerPayments\CustomerPaymentsResource;

class CreateCustomerPayments extends CreateRecord
{
    protected static string $resource = CustomerPaymentsResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['customer_id'] = auth()->user()->id;

        $customerBill = CustomerBill::with('customer.customerTariff')->find($data['customer_bill_id']);

        if ($customerBill->status === 'paid') {
            Notification::make()
                ->title('Pembayaran Gagal')
                ->body('Tagihan ini sudah dibayar.')
                ->danger()
                ->send();

            $this->halt();
        }

        $data['total_amount'] = $customerBill->customer->customerTariff->price_in_kwh * $customerBill->total_meter + $data['admin_fee'];

        return $data;
    }
}
