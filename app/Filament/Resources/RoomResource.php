<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RoomResource\Pages;
use App\Models\Room\Room;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;

class RoomResource extends Resource
{
    protected static ?string $model = Room::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?string $navigationGroup = 'Customers & Bookings';

    protected static ?string $recordTitleAttribute = 'Room';

    protected static ?string $label = 'Room';

    protected static ?string $modelLabel = 'Room';

    protected static ?string $slug = 'rooms';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('room_no')
                    ->label('Room No.')
                    ->numeric()
                    ->minValue(100)
                    ->required(),
                Forms\Components\TextInput::make('floor')
                    ->label('Floor No.')
                    ->numeric()
                    ->minValue(1)
                    ->required(),
                Forms\Components\Select::make('type')
                    ->label('Type')
                    ->options([
                        'standard_single' => 'Standard Single',
                        'executive_single' => 'Executive Single',
                        'standard_double' => 'Standard Double',
                        'executive_double' => 'Executive Double',
                        'family_double' => 'Family Double',
                        'executive_suite' => 'Executive Suite',
                        'family_suite' => 'Family Suite',
                        'penthouse_suite' => 'Penthouse Suite',
                        'royal_villa' => 'Royal Villa'
                    ])
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make("room_no")
                    ->label('Room No.'),
                Tables\Columns\TextColumn::make("floor")
                    ->label('Floor'),
                Tables\Columns\SelectColumn::make("type")
                    ->label('Type')
                    ->options([
                        'standard_single' => 'Standard Single',
                        'executive_single' => 'Executive Single',
                        'standard_double' => 'Standard Double',
                        'executive_double' => 'Executive Double',
                        'family_double' => 'Family Double',
                        'executive_suite' => 'Executive Suite',
                        'family_suite' => 'Family Suite',
                        'penthouse_suite' => 'Penthouse Suite',
                        'royal_villa' => 'Royal Villa'
                    ])
                    ->disabled(),
                Tables\Columns\CheckboxColumn::make("availability")
                    ->label('Availability'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListRooms::route('/'),
            'create' => Pages\CreateRoom::route('/create'),
        ];
    }
}
