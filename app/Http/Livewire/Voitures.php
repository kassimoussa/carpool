<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Voitures extends Component
{
    
    public $user_id;
    public $voiture_id;
    public $marque;
    public $model;
    public $annee;
    public $couleur;
    public $plaque;
    public $type;
    public $photo;
    
    public $currentStep = 1;
    public $totalStep = 4;
    public $errorMsg = "Ce champ ne doit etre vide !";
    public $errorColor ="ring-2 ring-red-700 ring-inset";


    public function mount()
    {
        $this->user_id = session('id'); 
    }

    public function render()
    {
        return view('livewire.voitures');
    }
}
