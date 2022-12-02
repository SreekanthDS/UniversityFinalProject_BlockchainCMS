<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CustomerResource\Pages;
use App\Models\Customer\Customer;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;

class CustomerResource extends Resource
{
    protected static ?string $model = Customer::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?string $navigationGroup = 'Customers & Bookings';

    protected static ?string $recordTitleAttribute = 'Customer';

    protected static ?string $label = 'Customer';

    protected static ?string $modelLabel = 'Customer';

    protected static ?string $slug = 'customers';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('General Information')
                    ->schema([
                        Forms\Components\TextInput::make('first_name')
                            ->required(),
                        Forms\Components\TextInput::make('middle_name'),
                        Forms\Components\TextInput::make('last_name')
                            ->required(),
                        Forms\Components\TextInput::make('email')
                            ->email()
                            ->required(),
                        Forms\Components\Section::make('Permanent Address')
                            ->collapsed()
                            ->schema([
                                Forms\Components\TextInput::make('address_line_1')
                                    ->label('Address Line 1')
                                    ->required(),
                                Forms\Components\TextInput::make('address_line_2')
                                    ->label('Address Line 2')
                                    ->required(),
                                Forms\Components\TextInput::make('city')
                                    ->label('City')
                                    ->required(),
                                Forms\Components\TextInput::make('county')
                                    ->label('County/State'),
                                Forms\Components\TextInput::make('country')
                                    ->label('Country')
                                    ->required(),
                                Forms\Components\TextInput::make('postcode')
                                    ->label('ZipCode / PostCode')
                                    ->required(),
                            ]),
                    ]),
                Forms\Components\Section::make('Verification Documents')
                    ->schema([
                        Forms\Components\Select::make('id_type')
                            ->label('ID Type')
                            ->options([
                                'passport' => 'Passport',
                                'driving-licence' => 'Driving Licence',
                                'brp' => 'Biometric Residence Permit',
                            ])
                            ->required(),
                        Forms\Components\TextInput::make('id_number')
                            ->label('ID Number')
                            ->required(),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make("last_name")
                    ->label('Last Name')
                    ->getStateUsing(function ($record) {
                        return $record->blocks[1]->data['last_name'];
                    }),
                Tables\Columns\TextColumn::make("first_name")
                    ->label('First Name')
                    ->getStateUsing(function ($record) {
                        return $record->blocks[1]->data['first_name'];
                    }),
                Tables\Columns\TextColumn::make("email")
                    ->label('Email')
                    ->getStateUsing(function ($record) {
                        return $record->blocks[1]->data['email'];
                    }),
                Tables\Columns\TextColumn::make("postcode")
                    ->label('Postcode')
                    ->getStateUsing(function ($record) {
                        return $record->blocks[1]->data['postcode'];
                    }),
                Tables\Columns\TextColumn::make("id_type")
                    ->label('ID Type')
                    ->getStateUsing(function ($record) {
                        return $record->blocks[1]->data['id_type'];
                    }),
                Tables\Columns\TextColumn::make("id_number")
                    ->label('ID Number')
                    ->getStateUsing(function ($record) {
                        return $record->blocks[1]->data['id_number'];
                    }),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCustomers::route('/'),
            'create' => Pages\CreateCustomer::route('/create'),
        ];
    }
}
