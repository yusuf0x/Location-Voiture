<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CarsController extends Controller
{
    
    public function index(Request $request) 
    {
        $startdate = $request->filled("startdate") ? $request->startdate : date('y-m-d');
        $enddate = $request->filled('enddate') ? $request->enddate : date('y-m-d', strtotime('+3 days'));
        $age = $request->filled('age') ? $request->age : '24';
        $cars = DB::table("cars")->paginate(4);
        // dd($startdate,$enddate,$age);
        // dd($cars);
        $data = [
            "cars" => $cars,
            "startdate"=>$startdate,
            "enddate"=>$enddate,
            "age"=>$age,
            "all_cars" => $cars = DB::table("cars")->get()
        ];
        return view('cars')->with("data",$data);
    }
    public function filter(Request $request){

    
        $startdate = $request->filled("startdate") ? $request->startdate : date('y-m-d');
        $enddate = $request->filled('enddate') ? $request->enddate : date('y-m-d', strtotime('+3 days'));
        $age = $request->filled('age') ? $request->age : '24';
        $cars = DB::table("cars");
        if($request->marque != "tous" ){
            $cars = $cars->where("marque",$request->marque);
        }
        if($request->gasoil != "tous" ){
            $cars = $cars->where("gasoil",$request->gasoil);
        }
        $cars = $cars->paginate(4);
        $data = [
            "cars" => $cars,
            "startdate"=>$startdate,
            "enddate"=>$enddate,
            "age"=>$age
        ];
        return view("cars")->with("data",$data);
    }

}
