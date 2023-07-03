<?php

namespace App\Http\Controllers;

use App\Mail\ConfirmMail;
use App\Models\Car;
use App\Models\Reservation;
use App\Models\User;
use DateTime;
use Illuminate\Console\View\Components\Confirm;
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
                                                
        // dd($request);                                  
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
        $phone = $request->phone;
        $namec = $request->nameC;
        $nbrejours = $request->nbrejours;
        // $cin_path = $this->upload($request);
        // $request->validate([
            // 'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        // ]);
        // dd($request->hasFile('id_image'));
        $cin = $request->file('cin');
        $cin_path = time() . '_' . $cin->getClientOriginalName();
        $cin->storeAs('public/images', $cin_path);
        // dd($namec,$email,$phone);
        $user = [
            "name" => $namec,
            "email" => $email,
            "phone" => $phone
        ];
        $reservation = new Reservation();
        $token = Str::random(32);
        $item = $reservation->create(
            [
              
                "date_debut" => new DateTime($startdate),
                "date_fin" => new DateTime($enddate),
                "etat_reservation" => "pending",
                "totalttc" => $total,
                "car_id" => DB::table("cars")->where("name",$name)->first()->id,
                "user_id" => $client_id,
                "name_user" => $namec,
                "email_user" => $email,
                "phone_user" => $phone,
                "CIN" => $cin_path,
                "prix" => $prix,
                "nbjours" => $nbrejours,
                "verification_token" => $token,
                "verification_token_expires_at" => now()->addMinute(2),
            ]
        );
        
        $data = [
            "name" => $name,
            "startdate" => $startdate,
            "enddate"=> $enddate,
            "interval" => $interval,
            "prix" => $prix,
            "total" => $total,
            "reservation" => $item,
            "user_id" => $client_id,
            "user" => $user,
            "image" => $request->image,
            "nbrejours" => $request->nbrejours
        ];
        Mail::to($email)->send(new ConfirmMail($data,$token));
        return redirect("/confirmation")->with("data" ,$data );
    }
    public function verify($token)
    {
        $reservation = Reservation::where('verification_token', $token)->firstOrFail();
        // dd($reservation->verification_token_expires_at,NOW(),$reservation->verification_token_expires_at > NOW());
        if($reservation && $reservation->verification_token_expires_at > NOW()){
            $reservation->is_verified = true;
            $reservation->etat_reservation = "confirmed";
            $reservation->save();
            return redirect()->route('reservation.success');
        }
        // dd(NOW(),$reservation->verification_token_expires_at < NOW());
        // token expired
        if($reservation && $reservation->verification_token_expires_at < now()){
            $newToken = Str::random(32);
            $reservation->verification_token = $newToken;
            $reservation->verification_token_expires_at = NOW()->addMinute(2); 
            $reservation->save();
            $user = User::where("id",$reservation->user_id)->first();
            $car = Car::where("id",$reservation->car_id)->first();
            $data = [
                "name" => $car->name,
                "startdate" => $reservation->date_debut,
                "enddate"=> $reservation->date_fin,
                "interval" => $reservation->nbrejours,
                "prix" => $reservation->prix ,//prix,
                "total" => $reservation->totalttc,
                "reservation" => $reservation,
                "nbrejours" => $reservation->nbjours
            ];
            // dd($reservation->email_user);
            Mail::to($reservation->email_user )
                ->send(new ConfirmMail($data,$newToken));
            return redirect()->route('reservation.emailResent');
        }
        return redirect()->route("reservation.invalidToken");
    }

    public function success()
    {
        return view('reservation.success');
    }
    public function status(Reservation $reservation)
    {
        return view('reservation.status', compact('reservation'));
    }
    private function upload(Request $request){
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $image = $request->file('cin');
        $imageName = time() . '_' . $image->getClientOriginalName();
        $image->storeAs('public/images', $imageName);
        return $imageName;
    }
}
