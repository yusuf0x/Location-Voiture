<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ConfirmationController extends Controller
{
    public function confirmation(Request $request){
        
        // $reservationId = DB::table("reservations")->first()->id;
        // dd($request->data);
        $data = session('data');
        // $data = request()->query('data');
        // gettype($data);
        // dd($data);
        // dd($data,gettype($data));
        // print_r($data->image);
        return view("confirmation")->with("data",$data);
    }
    

}
