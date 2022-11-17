<?php

namespace App\Events;

use App\Models\Customer\CustomerBlockChain;
use Spatie\EventSourcing\StoredEvents\ShouldBeStored;

class CreateCustomerBlockchain extends ShouldBeStored
{
    public CustomerBlockChain $customerBlockChain;

    public array $data;

    public function __construct(CustomerBlockChain $customerBlockChain, array $data)
    {
        $this->customerBlockChain = $customerBlockChain;
        $this->data = $data;
    }
}
