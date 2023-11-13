<?php

namespace App\Http\Livewire;

use App\Models\Couleur;
use App\Models\TypeVoiture;
use Livewire\Component;
use App\Models\Vehicule;

class VoitureInfos extends Component
{
    public $user_id;
    public $voiture_id;
    public $marque, $marque2;
    public $model, $model2;
    public $annee, $annee2;
    public $couleur, $color, $couleur2, $hexcode;
    public $plaque, $plaque2;
    public $type, $type2;
    public $photo, $photo2;
    public $vehicule, $colors, $types;

    public function mount($voiture)
    {
        $this->user_id = session('id'); 
        $this->vehicule = $voiture;
        $this->voiture_id = $voiture->id;  
        $this->marque2 = $this->marque = $voiture->marque; 
        $this->model2 = $this->model = $voiture->model;
        $this->type2 = $this->type = $voiture->type; 
        $this->couleur2 = $this->couleur = $voiture->couleur;  
        $this->hexcode2 = $this->hexcode = $voiture->hexcode;  
        $this->annee2 = $this->annee = $voiture->annee; 
        $this->plaque2 = $this->plaque = $voiture->plaque; 

        $this->colors = Couleur::all();
        $this->types = TypeVoiture::all();
        
    }

    public function change_hexcode($code)
    { 
        $this->hexcode2 = $code ;
    }

    public function close_modal()
    { 
        $this->marque2 = $this->marque ; 
        $this->model2 = $this->model ;
        $this->type2 = $this->type ; 
        $this->couleur2 = $this->couleur ;  
        $this->hexcode2 = $this->hexcode ;
        $this->annee2 = $this->annee ;  
        $this->plaque2 = $this->plaque ;    
    }

    public function save()
    {
        
        $this->marque = $this->marque2 ; 
        $this->model = $this->model2 ;
        $this->type = $this->type2 ; 
        $this->couleur = $this->couleur2 ;  
        $this->hexcode = $this->hexcode2 ;
        $this->annee = $this->annee2 ; 
        $this->plaque = $this->plaque2 ;  

        $voiture_edit =  Vehicule::where('id', $this->voiture_id)->first();
        $voiture_edit->update([
            "marque" => $this->marque2,
            "model" => $this->model2,
            "type" => $this->type2,
            "couleur" => $this->couleur2,
            "hexcode" => $this->hexcode2,
            "annee" => $this->annee2,
            "plaque" => $this->plaque2,
        ]);

    }

    public function delete_car()
    { 
        $query = Vehicule::destroy($this->voiture_id);
        if($query)
        {
            return redirect('profil')->with("success" , "Voiture supprimé de la base de données");
        }
    }

    

    public function render()
    {
        return view('livewire.voiture-infos');
    }
}
