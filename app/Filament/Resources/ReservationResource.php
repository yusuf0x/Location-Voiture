<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ReservationResource\Pages;
use App\Filament\Resources\ReservationResource\RelationManagers;
use App\Models\Car;
use App\Models\Reservation;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Hash;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Forms\Components\CheckboxList;
class ReservationResource extends Resource
{
    protected static ?string $model = Reservation::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            // Forms\Components\TextInput::make('num_reservation')
                // ->required()
                // ->maxLength(255),
            Forms\Components\DatePicker::make('date_debut')
                ->required(),
            Forms\Components\DatePicker::make('date_fin')
                ->required(),
            Forms\Components\Select::make('etat_reservation')
            ->options([
                'Pending' => 'Pending',
                'Completed' => 'Completed',
                "Approved"=>"Approved",
                "Cancelled"=>"Cancelled"
            ])
            ->required(),
            Forms\Components\TextInput::make('totalttc')
                ->required(),
            Forms\Components\Select::make('car_id')
                ->relationship("car","name")
                ->required(),
            Forms\Components\Select::make('user_id')
                ->relationship("user","name")
                ->required(),
    
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')->label("Num reservation")->searchable(),
                Tables\Columns\TextColumn::make('date_debut')->searchable(),
                Tables\Columns\TextColumn::make('date_fin')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('etat_reservation')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('totalttc')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('user.name')->sortable(),
                Tables\Columns\TextColumn::make('car.name')->sortable(),
                Tables\Columns\TextColumn::make('created_at')->dateTime('d-M-Y')->sortable()->searchable(),
            ])
            ->filters([
                //
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
            'index' => Pages\ListReservations::route('/'),
            'create' => Pages\CreateReservation::route('/create'),
            'edit' => Pages\EditReservation::route('/{record}/edit'),
        ];
    }    
}
