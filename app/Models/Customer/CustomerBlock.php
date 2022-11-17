<?php

namespace App\Models\Customer;

use App\Contracts\Comparable;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use ReflectionException;

final class CustomerBlock extends Model implements Comparable
{
    protected $table = 'customer_blocks';

    protected $guarded = [];

    protected $casts = [
        'data' => 'array',
    ];

    /**
     * Detect if block is valid
     *
     * @return bool True if block is valid, false otherwise
     *
     * @throws ReflectionException
     */
    public function isValid(): bool
    {
        // If is Genesis block, compare to our genesis block
        if ($this->getIndex() === 0) {
            return $this->compare(
                self::genesis($this->getData())
            );
        }

        // Previous block blockIndex match
        if ($this->getIndex() !== $this->previousBlock->getIndex() + 1) {
            return false;
        }

        // Previous block hash match
        if ($this->getPreviousHash() !== $this->previousBlock->gethash()) {
            return false;
        }

        // Block hash is valid
        if ($this->getHash() !== $this->generateHash()) {
            return false;
        }

        return true;
    }

    /**
     * Compare Block to another
     *
     * @param  mixed  $compare Comparable object
     * @return bool
     */
    public function compare(mixed $compare): bool
    {
        if (! ($compare instanceof Arrayable)) {
            return false;
        }

        if (! ($compare instanceof self)) {
            return false;
        }

        return $this->toArray() === $compare->toArray();
    }

    public function blockChain(): BelongsTo
    {
        return $this->belongsTo(CustomerBlockChain::class, 'blockchain_id', 'uuid');
    }
}
