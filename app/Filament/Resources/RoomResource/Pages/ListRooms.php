<?php

namespace App\Filament\Resources\RoomResource\Pages;

use App\Filament\Resources\CustomerResource;
use App\Filament\Resources\RoomResource;
use App\Models\Customer\Customer;
use App\Models\Customer\CustomerBlockChain;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;

class ListRooms extends ListRecords
{
    protected static string $resource = RoomResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
