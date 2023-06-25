<?php

namespace App\Http\Controllers;

use App\Mail\ConfirmMail;
use App\Models\Car;
use App\Models\Reservation;
use DateTime;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Ramsey\Uuid\Nonstandard\Uuid as NonstandardUuid;
use Ramsey\Uuid\Rfc4122\UuidV4;
use Ramsey\Uuid\Uuid;
use Symfony\Polyfill\Uuid\Uuid as UuidUuid;

class CheckOutController extends Controller
{
   
    public function index(Request $request) 
    {
        $startdate = $request->startdate;
        $enddate = $request->enddate;
        $image = $request->image;
        $id = $request->id;
        $prix = $request->prix;
        $name = $request->name;
        $datedebut = new DateTime($startdate);
        $datefin = new DateTime($enddate);
        $interval = $datedebut->diff($datefin);
        $nbrejours = $interval->days + 1;
        $total = $nbrejours *(float)$prix; 
                                                
                                            
        $data = [
            "startdate" => $startdate,
            "enddate" => $enddate,
            "image" => $image,
            "id" => $id,
            "prix" => $prix,
            "name" => $name,
            "total" => $total,
            "nbrejours" => $nbrejours
        ];
        return view('checkout')->with("data",$data);
    }

    public function confirm(Request $request){

        $startdate =  $request->startdate;
        $enddate = $request->enddate;
        $name = $request->name;
        $interval = $request->interval;
        $prix = $request->prix;
        $total = $request->total;
        $client_id = $request->client_id;
        $email = $request->email;
        $reservation = new Reservation;
        $reservation->create(
            [
              
                "date_debut" => new DateTime($startdate),
                "date_fin" => new DateTime($enddate),
                "etat_reservation" => "pending",
                "totalttc" => $total,
                "car_id" => DB::table("cars")->where("name",$name)->first()->id,
                "user_id" => $client_id,
            ]
        );
        $data = [
            "name" => $name,
            "startdate" => $startdate,
            "enddate"=> $enddate,
            "interval" => $interval,
            "prix" => $prix,
            "total" => $total,
        ];
        Mail::to($email)->send(new ConfirmMail($data));
        return redirect("/cars");
    }
}
