<?php

namespace App\Http\Livewire;

use App\Models\Trajet;
use App\Models\User;
use App\Models\Voyage;
use Carbon\Carbon;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class MesTrajets extends Component
{
    public $focus1, $focus2, $focus_div;
    public $user_id, $trajets, $publies, $voyages, $achetes;

    public function mount()
    {
        $this->focus1 = " border-blue-600  text-blue-600 text-xl font-bold  ";
        $this->focus2 = " border-gray-600 text-gray-600 text-xl font-semibold ";
        $this->focus_div = 1;

        $this->user_id = session('id');
        $this->trajets = Trajet::where('user_id', $this->user_id)->orderBy('date', 'asc')->get();
        if ($this->trajets) {
            $this->publies = collect($this->trajets)->map(function ($trajet) {
                return collect($trajet)->merge([
                    'ville_depart' => $trajet['ville_depart'],
                    'ville_destination' => $trajet['ville_destination'],
                    'created_at' => Carbon::parse($trajet['created_at'])->locale('fr_FR')->isoFormat('LL'),
                    'date' => Carbon::parse($trajet['date'])->locale('fr_FR')->isoFormat('LL'),
                    'heure' => Carbon::parse($trajet['heure'])->format('H:i'),
                    'prix' => $trajet['prix'],
                ])->only('id', 'ville_depart', 'ville_destination', 'date', 'heure', 'prix', 'created_at');
            });
        }

       // $this->voyages = Voyage::where('passager_id', $this->user_id)->orderBy('save_date', 'asc')->get();
        $this->achetes = DB::table('trajets')
            ->join('voyages', 'trajets.id', '=', 'voyages.trajet_id')
            ->select(
                'trajets.*',
                'voyages.id as V_id',
                'voyages.montant as V_montant',
                'voyages.nbPassager as V_nbPassager',
                'voyages.save_date as V_save_date'
            )->where('voyages.passager_id', $this->user_id )->get();

        $this->voyages = collect($this->achetes)->map(function ($trajet) {
            $user = User::where('id', $trajet->user_id)->first();

            return collect($trajet)->merge([
                'ville_depart' => $trajet->ville_depart,
                'ville_destination' => $trajet->ville_destination,
                'date' => Carbon::parse($trajet->date)->locale('fr_FR')->isoFormat('LL'),
                'heure' => Carbon::parse($trajet->heure)->format('H:i'),
                'date_achat' => Carbon::parse($trajet->V_save_date)->locale('fr_FR')->isoFormat('LL'),
                'prix' => $trajet->prix,
                'user_name' => $user->name,
                'user_photo' => $user->image_path
                    ? "storage/" . $user->image_path
                    : 'https://ui-avatars.com/api/?size=235&name=' . $user->name,
            ]);
        });

        //dump($this->voyages);
    }

    public function focus($i)
    {
        if ($i == 1) {
            $this->focus1 = " border-blue-600  text-blue-600 text-xl font-bold ";
            $this->focus2 = " border-gray-600 text-gray-600 text-xl font-semibold ";
            $this->focus_div = 1;
        } elseif ($i == 2) {
            $this->focus2 = " border-blue-600  text-blue-600 text-xl font-bold ";
            $this->focus1 = " border-gray-600 text-gray-600 text-xl font-semibold ";
            $this->focus_div = 2;
        }
    }

    public function render()
    {
        return view('livewire.mes-trajets');
    }
}
