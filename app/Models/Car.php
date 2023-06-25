<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 
        'marque',
        "image",
        "gasoil",
        "boite_vitesse",
        "climatisation",
        "places",
        "valises",
        "portes",
        "prix"
    ];
    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }
}
