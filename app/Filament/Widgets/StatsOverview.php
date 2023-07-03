<?php

namespace App\Filament\Widgets;

use App\Models\Car;
use App\Models\Reservation;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class StatsOverview extends BaseWidget
{
    protected function getCards(): array {
        $users_count = User::get()->count();
        $cars_count = Car::get()->count();
        $reservations_count = Reservation::get()->count();
        $pending_reservations_count = Reservation::where("etat_reservation","pending")->get()->count();
        $confirmed_reservations_count = Reservation::where("etat_reservation","confirmed")->get()->count();
        // ->length();
        return [
            Card::make('Numbers of Users', $users_count)
                // ->description('32k increase')
                // ->chart([7, 2, 10, 3, 15, 4, 17]),
                // ->descriptionIcon('heroicon-s-trending-up'),
                ,
            Card::make('Numbers of Cars',$cars_count),
                // ->description('7% increase')
                // ->descriptionIcon('heroicon-s-trending-down'),
            Card::make('Numbers of Reservations', $reservations_count),
                // ->description('3% increase')
                // ->descriptionIcon('heroicon-s-trending-up'),
            Card::make('Pending reservations.', $pending_reservations_count),
            Card::make('Confirmed reservations.', $confirmed_reservations_count)

        ];
    }
}