<?php

namespace App\Models\Customer;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use ReturnTypeWillChange;

final class CustomerBlockChain extends Model implements \Countable
{
    protected $table = 'customer_block_chain';

    protected $guarded = [];

    /**
     * Detect if blockchain is valid
     */
    public function isValid(): bool
    {
        // No blocks mean no genesis block, invalid chain
        if (count($this) === 0) {
            return false;
        }

        // Chain has valid genesis block
        $genesis = reset($this->blocks);
        if (! $genesis->compare(CustomerBlock::genesis())) {
            return false;
        }

        // Check every block for validity
        foreach ($this as $userBlock) {
            if (! $userBlock->isValid()) {
                return false;
            }
        }

        return true;
    }

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class, 'customer_id', 'uuid');
    }

    public function blocks(): HasMany
    {
        return $this->hasMany(CustomerBlock::class, 'blockchain_id', 'uuid');
    }

    #[ReturnTypeWillChange] public function count()
    {
        // TODO: Implement count() method.
    }
}
