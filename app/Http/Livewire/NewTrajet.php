<?php

namespace App\Http\Livewire;

use App\Models\Trajet;
use App\Models\Vehicule;
use App\Models\Ville;
use Livewire\Component;
use Carbon\Carbon;

class NewTrajet extends Component
{
    public $audj;
    public $date_today;
    public $hour_today;
    public $user_id;
    public $ville_depart;
    public $depart = "";
    public $quartier_depart;
    public $ville_destination;
    public $destination = "";
    public $quartier_destination;
    public $date;
    public $heure;
    public $prix;
    public $voiture_id;

    public $nb_passager = 1;
    public $text = "Passager";
    public $currentStep = 1;
    public $totalStep;
    public $errorMsg = "Ce champ ne doit etre vide !";
    public $errorColor = "ring-2 ring-red-700 ring-inset";

    public $voitures;

    public function mount()
    {
        $this->user_id = session('id');
        $this->voitures = Vehicule::where('user_id', $this->user_id)->get();

        if (count($this->voitures) == 0) {
            $this->totalStep = 4;
        } else {
            $this->totalStep = 5;
        }

        $this->audj = Carbon::today()->format('Y-m-d');
        $this->hour_today = Carbon::now()->setTimezone('Africa/Djibouti')->format('H:i');
        $this->date_today = Carbon::now()->setTimezone('Africa/Djibouti')->format('Y-m-d');
    }


    public function render()
    {
        $search1 =  $this->ville_depart;
        $search2 =  $this->ville_destination;

        $ville_departs =  Ville::where('nom_ville', 'Like', '%' . $search1 . '%')->orderBy('nom_ville', 'asc')->get();
        $ville_destinations =  Ville::where('nom_ville', 'Like', '%' . $search2 . '%')->orderBy('nom_ville', 'asc')->get();

        if ($this->nb_passager > 1) {
            $this->text = "Passagers";
        } elseif ($this->nb_passager == 1) {
            $this->text = "Passager";
        }
        return view('livewire.new-trajet', [
            'ville_departs' => $ville_departs,
            'ville_destinations' => $ville_destinations,
        ]);
    }

    public function select_vdp($ville)
    {
        $this->depart = $ville;
    }

    public function select_vdt($ville)
    {
        $this->destination = $ville;
    }

    public function step_increment()
    {
        $this->resetErrorBag();
        // $this->validateData();
        if ($this->currentStep < $this->totalStep) {
            $this->currentStep++;
        }
    }

    public function step_decrement()
    {
        $this->resetErrorBag();
        if ($this->currentStep > 1) {
            $this->currentStep--;
        }
    }

    public function increment()
    {
        $this->nb_passager++;
    }

    public function decrement()
    {
        if ($this->nb_passager > 1) {
            $this->nb_passager--;
        }
    }

    protected $rules = [
        'ville_depart' => 'required',
        'quartier_depart' => 'required',
        'ville_destination' => 'required',
        'quartier_destination' => 'required',
        'date' => 'required',
        'heure' => 'required',
        'prix' => 'required',
        //'voiture_id'=> 'required', 

    ];

    public function validateData()
    {
        if ($this->currentStep == 1) {
            $this->validate([
                'ville_depart' => 'required',
                'quartier_depart' => 'required',
            ]);
        } elseif ($this->currentStep == 2) {
            $this->validate([
                'ville_destination' => 'required',
                'quartier_destination' => 'required',
            ]);
        } elseif ($this->currentStep == 3) {
            $this->validate([
                'date' => 'required',
                'heure' => 'required',
            ]);
        } elseif ($this->currentStep == 4) {
            $this->validate([
                'nb_passager' => 'required',
                'prix' => 'required',
            ]);
        }
    }

    public function save()
    {
        $this->resetErrorBag();
        /* if ($this->currentStep == 5) 
        {
            $this->validate([
                'voiture_id'=> 'required', 
            ]);
        }  */

        $trajet = new Trajet();
        $trajet->ville_depart = $this->depart;
        $trajet->quartier_depart = $this->quartier_depart;
        $trajet->ville_destination = $this->destination;
        $trajet->quartier_destination = $this->quartier_destination;
        $trajet->date = $this->date;
        $trajet->heure = $this->heure;
        $trajet->user_id = $this->user_id;
        $trajet->nb_passager = $this->nb_passager;
        $trajet->restant = $this->nb_passager;
        $trajet->prix = $this->prix;
        $trajet->voiture_id = $this->voiture_id;
        $query = $trajet->save();

        //dump($query);


        return redirect('/')->with("success", "Trajet ajouté !!");
    }
}
