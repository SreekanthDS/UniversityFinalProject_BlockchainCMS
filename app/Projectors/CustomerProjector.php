<?php

namespace App\Projectors;

use App\Events\CreateCustomerBlockchain;
use App\Events\CreateGenesisBlock;
use App\Events\CreateNextBlock;
use App\Models\Customer\CustomerBlock;
use App\Models\Customer\CustomerBlockChain;
use DateTime;
use Filament\Notifications\Notification;
use Spatie\EventSourcing\EventHandlers\Projectors\Projector;

define('HASH_ALG', 'sha256');

class CustomerProjector extends Projector
{
    /**
     * @param CreateCustomerBlockchain $event
     * @return void
     */
    public function onCreateCustomerBlockchain(CreateCustomerBlockchain $event)
    {
        $customerBlockChain = $event->customerBlockChain;
        $blockData = $event->data;

        $blocks = $customerBlockChain->blocks()->get();
        $totalBlocks = $blocks->count();

        $previousBlock = $blocks[$totalBlocks - 1];
        $currentBlockHash = hash(HASH_ALG, implode(',', $blockData));
        $allBlocks = CustomerBlock::query()->whereNotNull('previous_hash')->where('hashed_data', '=', $currentBlockHash)->get();

        if ($allBlocks->count() === 0) {
            event(new CreateNextBlock($customerBlockChain, $previousBlock, $blockData, $totalBlocks));
        } else {
            Notification::make()
                ->danger()
                ->title('Customer already Exists')
                ->send();

            $event->customer->delete();
        }
    }

    /**
     * @param CreateGenesisBlock $event
     * @return void
     */
    public function onCreateGenesisBlock(CreateGenesisBlock $event)
    {
        $this->createBlock($event->customerBlockChain, 1, null, ['genesis']);
    }

    /**
     * @param CreateNextBlock $event
     * @return void
     */
    public function onCreateNextBlock(CreateNextBlock $event)
    {
        $previousBlock = $event->previousBlock;
        $totalBlocks = $event->totalBlocks;

        $this->createBlock($event->customerBlockChain, $totalBlocks + 1, $previousBlock->hash, $event->nextBlockData);
    }

    /**
     * @param CustomerBlockChain $customerBlockChain
     * @param int $blockIndex
     * @param string|null $previousHash
     * @param array $blockData
     * @return void
     */
    public function createBlock(CustomerBlockChain $customerBlockChain, int $blockIndex, string|null $previousHash, array $blockData)
    {
        $createdAt = new DateTime();
        $hashedData = hash(
            HASH_ALG,
            implode(',', $blockData)
        );
        $hash = hash(
            HASH_ALG,
            $blockIndex .
            $previousHash .
            $createdAt->getTimestamp() .
            $hashedData
        );

        CustomerBlock::create([
            'blockchain_id' => $customerBlockChain->uuid,
            'block_index' => $blockIndex,
            'previous_hash' => $previousHash,
            'created_at' => $createdAt,
            'data' => $blockData,
            'hash' => $hash,
            'hashed_data' => $hashedData,
        ]);
    }
}
