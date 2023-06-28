<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
class Reservation extends Model
{
    use HasFactory;
    use HasUuids;

    protected $fillable = [
        // 'num_reservation', 
        'date_debut',
        "date_fin",
        "etat_reservation",
        "totalttc",
        "car_id",
        "user_id",
        'verification_token', 'is_verified',
    ];
    protected $casts = [
        'is_verified' => 'boolean',
    ];
    public function car()
    {
        return $this->belongsTo(Car::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
