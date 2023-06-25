<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Car;
use File;

class CarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
    //    Car::truncate();
       $json = File::get("database/data/cars.json");
       $cars = json_decode($json);
       foreach($cars as $key => $value ){
            Car::create([
                "name" => $value->name ,
                "marque" => $value->marque,
                "image" => $value->image,
                "gasoil" => $value->gasoil,
                "boite_vitesse" => $value->boite_vitesse,
                "climatisation" => $value->climatisation,
                "places" => $value->places,
                "valises" => $value->valises,
                "portes" => $value->portes,
                "prix" => $value->prix
            ]);
       }
    }
}
