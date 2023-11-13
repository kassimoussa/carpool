<?php

namespace App\Http\Livewire;

use App\Models\Trajet;
use App\Models\User;
use Livewire\Component;
use App\Models\Ville;
use Carbon\Carbon;

class SearchBar extends Component
{
    public $audj;
    public $count = 1;
    public $hidden = "hidden";
    public $text = "Passager";
    public $ville_depart;
    public $depart = "";
    public $ville_destination;
    public $destination = "";
    public $date;
    public $date_today;
    public $hour_today;
    public $trajets, $collectTrajets;
    public $errorColor = "ring-2 ring-red-700 ring-inset";

    protected $rules = [
        'ville_depart' => 'required',
        'ville_destination' => 'required',
        'date' => 'required',
    ];

    public function mount()
    {
        $this->audj = Carbon::today()->format('Y-m-d');
        $this->hour_today = Carbon::now()->setTimezone('Africa/Djibouti')->format('H:i:s');
        $this->date_today = Carbon::now()->setTimezone('Africa/Djibouti')->format('Y-m-d');
    }

    public function research()
    {
        $this->validate([
            'ville_destination' => 'required',
            'ville_depart' => 'required',
            'date' => 'required',
        ]);
        $this->hidden = "show";
        $users = User::all();

        if ($this->date == $this->date_today) {

            $this->trajets = Trajet::where('ville_depart', 'Like', '%' . $this->depart . '%')
                ->where('ville_destination', 'Like', '%' . $this->destination . '%')
                ->whereDate('date', '=', $this->date)
                //->where('heure', '>=',  $this->hour_today)
                ->where('restant', '>=',  $this->count)
                ->orderBy('heure', 'asc')
                ->get();

            /* dump($this->collectTrajets); */
        } else {
            $this->trajets = Trajet::where('ville_depart', 'Like', '%' . $this->depart . '%')
                ->where('ville_destination', 'Like', '%' . $this->destination . '%')
                ->whereDate('date', '=', $this->date)
                ->where('restant', '>=',  $this->count)
                ->orderBy('heure', 'asc')
                ->get();
        }

        if ($this->trajets) {
            $this->collectTrajets = collect($this->trajets)->map(function ($trajet) {
                $user = User::where('id', $trajet['user_id'])->first();

                return collect($trajet)->merge([
                    'ville_depart' => $trajet['ville_depart'],
                    'ville_destination' => $trajet['ville_destination'],
                    'date' => Carbon::parse($trajet['date'])->locale('fr_FR')->isoFormat('LL'),
                    'heure' => Carbon::parse($trajet['heure'])->format('H:i'),
                    'prix' => $trajet['prix'] * $this->count,
                    'user_name' => $user['name'],
                    'user_photo' => $user['image_path']
                        ? "storage/" . $user['image_path']
                        : 'https://ui-avatars.com/api/?size=235&name=' . $user['name'],
                ])->only('id', 'ville_depart', 'ville_destination', 'date', 'heure', 'prix', 'user_name', 'user_photo');
            });
        }
    }
 
    /*  public function delhide()
    {
        if($this->hidden == "hidden") {
            $this->hidden ="";
        }
        else {
            $this->hidden ="hidden";
        }
        
    } */

    public function increment()
    {
        $this->count++;
    }

    public function decrement()
    {
        if ($this->count > 1) {
            $this->count--;
        }
    }

    public function select_vdp($ville)
    {
        $this->ville_depart = $ville;
    }

    public function select_vdt($ville)
    {
        $this->ville_destination = $ville;
    }

    public function render()
    {

        $search1 =  $this->ville_depart;
        $search2 =  $this->ville_destination;

        $ville_departs =  Ville::where('nom_ville', 'Like', '%' . $search1 . '%')->orderBy('nom_ville', 'asc')->get();
        $ville_destinations =  Ville::where('nom_ville', 'Like', '%' . $search2 . '%')->orderBy('nom_ville', 'asc')->get();

        if ($this->count > 1) {
            $this->text = "Passagers";
        } elseif ($this->count == 1) { 
            $this->text = "Passager";
        }
        return view('livewire.search-bar', [
            'ville_departs' => $ville_departs,
            'ville_destinations' => $ville_destinations,
        ]);
    }
}
