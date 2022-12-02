<?php

namespace App\Filament\Resources\RoomResource\Pages;

use App\Events\CreateCustomerBlockchain;
use App\Events\CreateGenesisBlock;
use App\Filament\Resources\CustomerResource;
use App\Filament\Resources\RoomResource;
use App\Models\Customer\Customer;
use App\Models\Customer\CustomerBlock;
use App\Models\Customer\CustomerBlockChain;
use App\Models\Room\Room;
use Exception;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;
use function PHPUnit\Framework\isEmpty;

class CreateRoom extends CreateRecord
{
    protected static string $resource = RoomResource::class;

    protected function handleRecordCreation(array $data): Model
    {
        return Room::create($data);
    }

//    protected function afterCreate(): void
//    {
//        dd($this->customer->customerBlockchain);
//    }
}
