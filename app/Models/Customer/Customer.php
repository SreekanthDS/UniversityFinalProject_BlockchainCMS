<?php

namespace App\Models\Customer;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Customer extends Model
{
    protected $table = 'customers';

    protected $guarded = [];

    public function customerBlockchain(): HasOne
    {
        return $this->hasOne(CustomerBlockChain::class, 'customer_id', 'uuid');
    }
}
