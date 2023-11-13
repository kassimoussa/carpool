<?php

namespace App\Http\Livewire;

use App\Http\Livewire\Autocomplete;
use App\Models\Ville;
use Livewire\Component;


class VilleAutocomplete extends Autocomplete
{
    protected $listeners = ['valueSelected'];

    public function valueSelected(Ville $ville)
    {
        $this->emitUp('villeSelected', $ville);
    }

    public function query() {
        return Ville::where('nom_ville', 'like', '%'.$this->search.'%')->orderBy('nom_ville');
    }
}