<?php

namespace App\Http\Livewire;

use App\Models\Trajet;
use App\Models\User;
use App\Models\Vehicule;
use App\Models\Voyage;
use Carbon\Carbon;
use Livewire\Component;

class TrajetAchete extends Component
{

    public $trajet, $voyage, $user, $trip, $voiture;
    
    public function mount($t_id, $v_id)
    {
        $trajet = Trajet::find($t_id);
        $voyage = Voyage::find($v_id);
        $user = User::find($trajet->user_id); 
        $this->voiture = Vehicule::find($trajet->voiture_id);

        $this->trip = collect($trajet)->merge([
            'ville_depart' => $trajet->ville_depart,
            'ville_destination' => $trajet->ville_destination,
            'date' => Carbon::parse($trajet->date)->locale('fr_FR')->isoFormat('LL'),
            'heure' => Carbon::parse($trajet->heure)->format('H:i'),
            'prix' => $trajet->prix,
            'date_achat' => Carbon::parse($voyage->save_date)->locale('fr_FR')->isoFormat('LL'),
            'montant' => $voyage->montant,
            'nbp' => $voyage->nbPassager,
            'passagers' => $voyage->nbPassager > 1 ? "passagers" : "passager" ,
            'user_name' => $user->name,
            'user_photo' => $user->image_path
                ? "storage/" . $user->image_path
                : 'https://ui-avatars.com/api/?size=235&name=' . $user->name,
            /* 'v_marque' => $voiture->marque ? $voiture->marque : null ,
            'v_model' => $voiture->model ? $voiture->model : null ,
            'v_couleur' => $voiture->couleur? $voiture->couleur : null ,
            'v_annee' => $voiture->annee? $voiture->annee : null , */
        ]);

       //dump($this->trip);
    }

    public function render()
    {
        return view('livewire.trajet-achete');
    }
}
