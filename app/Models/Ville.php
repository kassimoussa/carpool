<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Quartier;

class Ville extends Model
{
    use HasFactory;
    protected $fillable = [
        'region_id', 
        'nom_ville', 
    ];

    public function quartiers()
    {
        return $this->hasMany(Quartier::class, 'ville_id');
    }
}
