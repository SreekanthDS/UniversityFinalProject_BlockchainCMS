<?php

namespace App\Filament\Resources\CustomerResource\Pages;

use App\Events\CreateCustomerBlockchain;
use App\Events\CreateGenesisBlock;
use App\Filament\Resources\CustomerResource;
use App\Models\Customer\Customer;
use App\Models\Customer\CustomerBlockChain;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class CreateCustomer extends CreateRecord
{
    protected static string $resource = CustomerResource::class;

    protected static bool $canCreateAnother = false;

    private Customer $customer;

    private CustomerBlockChain $customerBlockChain;

    protected function beforeCreate(): void
    {
        $customer = Customer::create([
            'uuid' => Str::uuid(),
        ]);

        $customerBlockChain = CustomerBlockChain::create([
            'uuid' => Str::uuid(),
            'customer_id' => $customer->uuid,
        ]);

        event(new CreateGenesisBlock($customerBlockChain));

        $this->customer = $customer;
        $this->customerBlockChain = $customerBlockChain;
    }

    protected function handleRecordCreation(array $data): Model
    {
        event(new CreateCustomerBlockchain($this->customer, $this->customerBlockChain, $data));

        return $this->customer;
    }
}
