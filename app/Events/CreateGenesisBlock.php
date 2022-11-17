<?php

namespace App\Events;

use App\Models\Customer\CustomerBlockChain;
use Spatie\EventSourcing\StoredEvents\ShouldBeStored;

class CreateGenesisBlock extends ShouldBeStored
{
    public CustomerBlockChain $customerBlockChain;

    public function __construct(CustomerBlockChain $customerBlockChain)
    {
        $this->customerBlockChain = $customerBlockChain;
    }
}
