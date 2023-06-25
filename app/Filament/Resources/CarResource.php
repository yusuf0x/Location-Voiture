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

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
            Forms\Components\TextInput::make('name')
                ->required()
                ->maxLength(255),
            Forms\Components\TextInput::make('marque')
                ->required(),
            Forms\Components\TextInput::make('gasoil')
                ->required(),
            Forms\Components\TextInput::make('boite_vitesse')
            ->required(),
            Forms\Components\TextInput::make('climatisation')
            ->required(),
            Forms\Components\TextInput::make('places')
            ->numeric()
            ->required(),
            Forms\Components\TextInput::make('valises')
            ->numeric()
                ->required(),
            Forms\Components\TextInput::make('portes')
            ->numeric()
                ->required(),
            Forms\Components\TextInput::make('prix')
                ->required(),
            Forms\Components\FileUpload::make('image')->image(),
            ]);
    }

    public static function table(Table $table): Table
    {
            return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->searchable(),
                Tables\Columns\ImageColumn::make('image'),
                Tables\Columns\TextColumn::make('marque')->searchable(),
                Tables\Columns\TextColumn::make('gasoil')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('boite_vitesse')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('climatisation')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('places')->sortable(),
                Tables\Columns\TextColumn::make('valises')->sortable(),
                Tables\Columns\TextColumn::make('portes')->sortable(),
                Tables\Columns\TextColumn::make('prix')->sortable(),
                // Tables\Columns\TextColumn::make('deleted_at')->dateTime('d-M-Y')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('created_at')->dateTime('d-M-Y')->sortable()->searchable(),
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
}
