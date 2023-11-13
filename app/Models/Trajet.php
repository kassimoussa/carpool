<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model; 

class Trajet extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id', 
        'voiture_id' ,
        'ville_depart', 
        'quartier_depart', 
        'ville_destination', 
        'quartier_destination',
        'date', 
        'heure', 
        'nb_passager',
        'restant',
        'prix', 
    ];
}
