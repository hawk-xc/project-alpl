<?php

namespace App\Filament\Resources\CustomerPayments\Pages;

use App\Filament\Resources\CustomerPayments\CustomerPaymentResource;
use App\Models\CustomerBill;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;

class CreateCustomerPayment extends CreateRecord
{
    protected static string $resource = CustomerPaymentResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
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
