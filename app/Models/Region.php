<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Ville;

class Region extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom_region', 
    ];

    public function villes()
    {
        return $this->hasMany(Ville::class, 'region_id');
    }
}
