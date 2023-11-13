<?php

namespace App\Http\Livewire;

use App\Models\Preference;
use App\Models\Trajet;
use App\Models\User;
use App\Models\Vehicule;
use App\Models\Voyage;
use Carbon\Carbon;
use Livewire\Component;

class AchatTrajet extends Component
{ 
    public $trajet_id, $conducteur_id, $passager_id, $nb_passager, $trip, $user, $voiture, $trajet, $restant, $montant, $nbPassager;
    public $currentStep = 1;
    public $totalStep = 2;

    public function mount($trajet_id, $nb_passager)
    {
        $this->trajet = $trajet = Trajet::find($trajet_id);
        $this->trajet_id = $trajet->id;
        $this->conducteur_id = $trajet->user_id; 
        $this->nbPassager = $nb_passager; 
        $this->montant = $trajet->prix * $nb_passager; 
        $this->passager_id = session('id');

        $this->restant = $trajet->restant - $nb_passager;


        $user = User::where('id', $trajet->user_id)->first(); 
        $voiture = Vehicule::where('id',$trajet->voiture_id)->first();
        $prefs = Preference::where('user_id',$trajet->user_id)->first();

        $this->trip = collect($trajet)->merge([
            'ville_depart' => $trajet['ville_depart'],
            'ville_destination' => $trajet['ville_destination'],
            'date' => Carbon::parse($trajet['date'] )->locale('fr_FR')->isoFormat('LL'),
            'heure' => Carbon::parse($trajet['heure'])->format('H:i'),
            'prix' => $trajet['prix'] * $nb_passager,
            'nb' => $nb_passager,
            'passagers' => $nb_passager > 1 ? "passagers" : "passager" ,            
            'user_id' => $user['id'],
            'user_name' => $user['name'],
            'user_photo' => $user['image_path']
                ? "storage/".$user['image_path']
                : 'https://ui-avatars.com/api/?size=235&name='. $user['name'],
            "vbool" => $voiture ? true : false ,
            "marque" => $voiture['marque'],
            "model" => $voiture['model'],
            "couleur" => $voiture['couleur'],  
            "pbool" => $prefs ? true : false , 
            "discussion" => $prefs['discussion'],
            "musique" => $prefs['musique'],
            "cigarette" => $prefs['cigarette'],
        ]);
    }

    public function step_increment()
    { 
        $this->currentStep++;
    }

    public function step_decrement()
    { 
        if ($this->currentStep > 1) {
            $this->currentStep--;
        }
    }

    public function save()
    {
        $voyage = new Voyage();
        $voyage->conducteur_id = $this->conducteur_id ;
        $voyage->passager_id = $this->passager_id ;
        $voyage->trajet_id = $this->trajet_id ;
        $voyage->montant = $this->montant ;
        $voyage->nbPassager = $this->nbPassager ;
        $voyage->save_date = Carbon::now();
        $query1 = $voyage->save();

        $query2 = $this->trajet->update(['restant' => $this->restant ]);
        
        if($query1 && $query2)
        {
            return redirect('/')->with('success', "Votre achat du billet est un success ");
        } else {

        }


    }

    public function render()
    {
        return view('livewire.achat-trajet');
    }
}
