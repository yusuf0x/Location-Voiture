<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
   
    public function index() 
    {
        $cars = DB::table("cars");
        $cars_moins_cher = $cars->where("prix","<",400);
        $cars = DB::table("cars");
        $cars_recommended = $cars->where("prix",">",400,"and","prix","<",800);
        $cars = DB::table("cars");
        $cars_LUXUEUX = $cars->where("prix",">",800);
        // $cars = DB::table("cars");
        // dd($cars_recommended->get());
        $data = [
            "cars_LUXUEUX" => $cars_LUXUEUX->get(),
            "cars_recommended" => $cars_recommended->get(),
            "cars_moins_cher" => $cars_moins_cher->get(),
            "id1" => $cars_moins_cher->first()->id,
            "id2" => $cars_recommended->first()->id,
            "id3" => $cars_LUXUEUX->first()->id,

        ];
        return view('home')->with("data",$data);
    }
}
