<?php

namespace App\Models\User;

use App\Contracts\Comparable;
use DateTimeImmutable;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use JetBrains\PhpStorm\ArrayShape;
use JsonSerializable;
use ReflectionClass;
use ReflectionException;

define('HASH_ALG', 'sha256');

final class UserBlock implements JsonSerializable, Arrayable, Comparable
{
    use HasFactory;

    /**
     * Block index
     *
     * @var ?int
     */
    private ?int $blockIndex = null;

    /**
     * Block hash
     *
     * @var ?string
     */
    private ?string $hash = null;

    /**
     * Previous Block's hash
     *
     * @var ?string
     */
    private ?string $previousHash = null;

    /**
     * Block created timestamp
     *
     * @var ?DateTimeImmutable
     */
    private ?DateTimeImmutable $createdAt = null;

    /**
     * Block data
     *
     * @var ?string
     */
    private ?string $data = null;

    /**
     * Previous Block
     *
     * @var ?UserBlock
     */
    private ?UserBlock $previousBlock = null;

    /**
     * @param  UserBlock|null  $previousBlock
     * @param  string|null  $data
     *
     * @throws ReflectionException
     */
    public function __construct(?self $previousBlock, ?string $data)
    {
        if ($previousBlock instanceof self) {
            $this->blockIndex = $previousBlock->getIndex() + 1;
            $this->previousHash = $previousBlock->getHash();
            $this->createdAt = new DateTimeImmutable();
            $this->data = $data;
            $this->hash = $this->generateHash();
            $this->previousBlock = $previousBlock;
        } else {
            $genesisObject = self::genesis();

            $this->blockIndex = $genesisObject->getIndex();
            $this->previousHash = '';
            $this->createdAt = $genesisObject->createdAt;
            $this->data = $genesisObject->data;
            $this->hash = $genesisObject->hash;
            $this->previousBlock = null;
        }
    }

    /**
     * Generate genesis block
     *
     * @param  string  $data Data to store in block
     * @return self
     *
     * @throws ReflectionException
     */
    public static function genesis(string $data = 'genesis'): self
    {
        $genesis = (new ReflectionClass(self::class))->newInstanceWithoutConstructor();

        if ($genesis instanceof self) {
            $genesis->blockIndex = 0;
            $genesis->previousHash = null;
            $genesis->createdAt = new DateTimeImmutable();
            $genesis->data = $data;
            $genesis->hash = $genesis->generateHash();
        }

        return $genesis;
    }

    /**
     * Get block blockIndex
     *
     * @return int Block blockIndex
     */
    public function getIndex(): int
    {
        return $this->blockIndex;
    }

    /**
     * Get block hash
     *
     * @return string Block hash
     */
    public function getHash(): string
    {
        return $this->hash;
    }

    /**
     * Get previous block hash
     *
     * @return string Previous block hash
     */
    public function getPreviousHash(): string
    {
        return $this->previousHash;
    }

    /**
     * Get block data
     *
     * @return string Block data
     */
    public function getData(): string
    {
        return $this->data;
    }

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
     * Generate hash for block
     *
     * @return string Generated hash
     */
    public function generateHash(): string
    {
        return hash(
            HASH_ALG,
            $this->blockIndex.
            $this->previousHash.
            $this->createdAt->getTimestamp().
            $this->data
        );
    }

    /**
     * Get block as array
     *
     * @return array
     */
    #[ArrayShape(['blockIndex' => 'mixed', 'hash' => 'mixed', 'previousHash' => 'mixed', 'createdTime' => 'int', 'data' => 'string'])]
    public function toArray(): array
    {
        return [
            'blockIndex' => $this->blockIndex,
            'hash' => $this->hash,
            'previousHash' => $this->previousHash,
            'createdTime' => $this->createdAt ? $this->createdAt->getTimestamp() : '',
            'data' => $this->data,
        ];
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

    /**
     * JsonSerializable
     *
     * @return array Blocks
     *
     * @ignore
     */
    #[ArrayShape(['blockIndex' => 'mixed', 'hash' => 'mixed', 'previousHash' => 'mixed', 'createdTime' => 'int', 'data' => 'string'])]
    public function jsonSerialize(): array
    {
        return $this->toArray();
    }
}
