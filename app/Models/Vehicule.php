<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicule extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id', 
        'marque', 
        'model', 
        'annee', 
        'couleur',
        'hexcode',
        'plaque', 
        'heure', 
        'type',
        'photo'  
    ];
}
