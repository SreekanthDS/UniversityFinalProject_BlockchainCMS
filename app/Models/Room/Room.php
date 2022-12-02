<?php

namespace App\Models\Room;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Room extends Model
{
    protected $table = 'rooms';

    protected $guarded = [];

//    public function customerBlockchain(): HasOne
//    {
//        return $this->hasOne(CustomerBlockChain::class, 'customer_id', 'uuid');
//    }
}
