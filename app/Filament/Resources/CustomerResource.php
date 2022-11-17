<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CustomerResource\Pages;
//use App\Filament\Resources\CustomerResource\RelationManagers;
use App\Models\Customer\CustomerBlockChain;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;

class CustomerResource extends Resource
{
    protected static ?string $model = CustomerBlockChain::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

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
                //
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
            'index' => Pages\ListCustomers::route('/'),
            'create' => Pages\CreateCustomer::route('/create'),
            'edit' => Pages\EditCustomer::route('/{record}/edit'),
        ];
    }
}
