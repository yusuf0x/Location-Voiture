<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CarResource\Pages;
use App\Filament\Resources\CarResource\RelationManagers;
use App\Models\Car;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Filters\TrashedFilter;
use App\Models\User;
use Filament\Pages\Page;

use Illuminate\Support\Facades\Hash;
use Filament\Forms\Components\CheckboxList;
use App\Filament\Resources\UserResource\Pages\EditUser;
use App\Filament\Resources\UserResource\Pages\CreateUser;
use App\Filament\Resources\UserResource\RelationManagers\RolesRelationManager;

class CarResource extends Resource
{
    protected static ?string $model = Car::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';
    // protected static ?string $navigationLabel = filament()->navigation->label('home');
    // protected static ?string $title = 'Custom Page Title';
    // protected static ?string $navigationLabel = 'Custom Navigation Label';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
            Forms\Components\TextInput::make('name')
                ->label(__('car.name'))
                ->required()
                ->maxLength(255),
            Forms\Components\TextInput::make('marque')
                ->label(__('car.type'))
                ->required(),
            Forms\Components\TextInput::make('gasoil')
            ->label(__('car.Diesel_fuel'))
                ->required(),
            Forms\Components\TextInput::make('boite_vitesse')
            ->label(__('car.Gear_box'))
            ->required(),
            Forms\Components\TextInput::make('climatisation')
            ->label(__("car.AirConditioner"))
            ->required(),
            Forms\Components\TextInput::make('places')
            ->label(__("car.Seats"))
            ->numeric()
            ->required(),
            Forms\Components\TextInput::make('valises')
            ->label(__("car.Suitcases"))
            ->numeric()
                ->required(),
            Forms\Components\TextInput::make('portes')
            ->label(__("car.Doors"))
            ->numeric()
                ->required(),
            Forms\Components\TextInput::make('prix')
            ->label(__("car.Price"))
                ->required(),
            Forms\Components\FileUpload::make('image')->image()
            ->label(__("car.Image")),
            ]);
    }

    public static function table(Table $table): Table
    {
            return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->label(__('car.name'))->searchable(),
                Tables\Columns\ImageColumn::make('image')->label(__("car.Image")),
                Tables\Columns\TextColumn::make('marque')->label(__('car.type'))->searchable(),
                Tables\Columns\TextColumn::make('gasoil')->label(__('car.Diesel_fuel'))->sortable()->searchable(),
                Tables\Columns\TextColumn::make('boite_vitesse')->label(__('car.Gear_box'))->sortable()->searchable(),
                Tables\Columns\TextColumn::make('climatisation')->label(__("car.AirConditioner"))->sortable()->searchable(),
                Tables\Columns\TextColumn::make('places')->label(__("car.Seats"))->sortable(),
                Tables\Columns\TextColumn::make('valises')->label(__("car.Suitcases"))->sortable(),
                Tables\Columns\TextColumn::make('portes')->label(__("car.Doors"))->sortable(),
                Tables\Columns\TextColumn::make('prix')->label(__("car.Price"))->sortable(),
                // Tables\Columns\TextColumn::make('deleted_at')->dateTime('d-M-Y')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('created_at')->label(__("car.created_at"))->dateTime('d-M-Y')->sortable()->searchable(),
            ])
            ->filters([
            //   TrashedFilter::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListCars::route('/'),
            'create' => Pages\CreateCar::route('/create'),
            'edit' => Pages\EditCar::route('/{record}/edit'),
        ];
    }    
    public static function navigationLabel()
    {
        return __('car.cars');
    }
}
