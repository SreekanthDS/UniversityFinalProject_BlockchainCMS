<?php

namespace App\Contracts;

/**
 * Comparable interface
 */
interface Comparable
{
    /**
     * Compare object to another
     *
     * @param  mixed  $compare Comparable object
     * @return bool
     */
    public function compare(mixed $compare): bool;
}
