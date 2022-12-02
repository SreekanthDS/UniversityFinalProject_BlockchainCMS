<?php

namespace App\Events;

use App\Models\Customer\Customer;
use App\Models\Customer\CustomerBlockChain;
use Spatie\EventSourcing\StoredEvents\ShouldBeStored;

class CreateCustomerBlockchain extends ShouldBeStored
{
    public Customer $customer;

    public CustomerBlockChain $customerBlockChain;

    public array $data;

    public function __construct(Customer $customer, CustomerBlockChain $customerBlockChain, array $data)
    {
        $this->customer = $customer;
        $this->customerBlockChain = $customerBlockChain;
        $this->data = $data;
    }
}
