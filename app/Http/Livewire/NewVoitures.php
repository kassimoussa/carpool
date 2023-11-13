<?php

namespace App\Http\Livewire;

use App\Models\Couleur;
use App\Models\TypeVoiture;
use App\Models\Vehicule;
use Livewire\Component;

class NewVoitures extends Component
{
    public $user_id;
    public $voiture_id;
    public $marque;
    public $model;
    public $annee;
    public $couleur, $color, $hexcode;
    public $plaque;
    public $type;
    public $photo;
    public $colors, $types;
    public $currentStep = 1;
    public $totalStep = 6;
    public $errorMsg = "Ce champ ne doit etre vide !";
    public $errorColor ="ring-2 ring-red-700 ring-inset";


    public function mount()
    {
        $this->user_id = session('id');  
        $this->colors = Couleur::all();
        $this->types = TypeVoiture::all();
    }

    public function select_color($select)
    {
        $this->color = $select ;   
    }


    public function step_increment()
    {
        $this->resetErrorBag(); 
        $this->validateData();

        $this->currentStep++;
    }

    public function step_decrement()
    {
        $this->resetErrorBag(); 
        if ($this->currentStep > 1) {
            $this->currentStep--;
        }
    }

    public function validateData()
    {
        if ($this->currentStep == 1) 
        {
            $this->validate([
                'marque' => 'required',
            ]);
        }
        elseif ($this->currentStep == 2) 
        {
            $this->validate([
                'model' => 'required', 
            ]);
        }  
        elseif ($this->currentStep == 3) 
        {
            $this->validate([
                'type' => 'required', 
            ]);
        } 
        elseif ($this->currentStep == 4) 
        {
            $this->validate([
                'couleur' => 'required', 
            ]);
        }  
        elseif ($this->currentStep == 5) 
        {
            $this->validate([
                'annee' => 'required', 
            ]);
        } 
    }

    public function change_hexcode($code)
    { 
        $this->hexcode = $code ;
    }

    public function add_car()
    {
        $this->resetErrorBag();
        if ($this->currentStep == 6) 
        {
            $this->validate([
                'plaque'=> 'required', 
            ]);
        }  

        $voiture = new Vehicule();
        $voiture->user_id = $this->user_id; 
        $voiture->marque = $this->marque;
        $voiture->model = $this->model; 
        $voiture->type = $this->type;
        $voiture->couleur = $this->couleur; 
        $voiture->hexcode = $this->hexcode; 
        $voiture->annee = $this->annee;
        $voiture->plaque = $this->plaque;  
        $voiture->save(); 

        return redirect('profil')->with("success" , "Voiture ajouté !!");
       

    }

    public function render()
    {
        return view('livewire.new-voitures');
    }
}
