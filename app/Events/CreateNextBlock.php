<?php

namespace App\Events;

use App\Models\Customer\CustomerBlock;
use App\Models\Customer\CustomerBlockChain;
use Spatie\EventSourcing\StoredEvents\ShouldBeStored;

class CreateNextBlock extends ShouldBeStored
{
    public CustomerBlockChain $customerBlockChain;

    public CustomerBlock $previousBlock;

    public array $nextBlockData;

    public int $totalBlocks;

    public function __construct(CustomerBlockChain $customerBlockChain, CustomerBlock $previousBlock, array $nextBlockData, int $totalBlocks)
    {
        $this->customerBlockChain = $customerBlockChain;
        $this->previousBlock = $previousBlock;
        $this->nextBlockData = $nextBlockData;
        $this->totalBlocks = $totalBlocks;
    }
}
