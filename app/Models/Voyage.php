<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voyage extends Model
{
    use HasFactory;
    protected $fillable = [
        'conducteur_id', 
        'passager_id',
        'trajet_id', 
        'montant', 
        'nbPassager', 
        'save_date',   
    ];
}
