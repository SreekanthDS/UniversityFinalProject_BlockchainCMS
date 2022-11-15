<?php

namespace App\Models\User;

use ArrayIterator;
use Countable;
use IteratorAggregate;
use JsonSerializable;
use ReflectionException;

final class UserBlockChain implements Countable, JsonSerializable, IteratorAggregate
{
    /**
     * Holds blocks
     *
     * @var array
     */
    private array $blocks = [];

    /**
     * Constructor
     *
     * Add genesis block
     *
     * @return void
     *
     * @throws ReflectionException
     */
    public function __construct()
    {
        // Add genesis block
        $this->add(
            UserBlock::genesis()
        );
    }

    /**
     * Add block to blockchain
     *
     * @param  UserBlock  $userBlock Block to add to chain
     * @return self
     */
    public function add(UserBlock $userBlock): self
    {
        $this->blocks[] = $userBlock;

        return $this;
    }

    /**
     * Detect if blockchain is valid
     *
     * @throws ReflectionException
     */
    public function isValid(): bool
    {
        // No blocks mean no genesis block, invalid chain
        if (count($this) === 0) {
            return false;
        }

        // Chain has valid genesis block
        $genesis = reset($this->blocks);
        if (! $genesis->compare(UserBlock::genesis())) {
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

    /**
     * Get last block in chain
     */
    public function last(): UserBlock
    {
        return end($this->blocks);
    }

    /**
     * Countable
     *
     * @return int Count of block in blockchain
     *
     * @ignore
     */
    public function count(): int
    {
        return count($this->blocks);
    }

    /**
     * JsonSerializable
     *
     * @return array Blocks
     *
     * @ignore
     */
    public function jsonSerialize(): array
    {
        return $this->blocks;
    }

    /**
     * Get blocks iterator
     *
     * @return ArrayIterator
     *
     * @ignore
     */
    public function getIterator(): ArrayIterator
    {
        return new ArrayIterator($this->blocks);
    }
}
