<?php

namespace App\Http\Controllers;

use App\Models\Preference;
use App\Models\Trajet;
use App\Models\User;
use App\Models\Vehicule;
use App\Models\Voyage;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TrajetController extends Controller
{
    public function achat_trajet($id, $count)
    {
        $trajet = Trajet::find($id);

        $user = User::where('id', $trajet->user_id)->first();
        $voiture = Vehicule::where('id',$trajet->voiture_id)->first();
        $prefs = Preference::where('user_id',$trajet->user_id)->first();
         

        $trip = collect($trajet)->merge([
            'ville_depart' => $trajet['ville_depart'],
            'ville_destination' => $trajet['ville_destination'],
            'date' => Carbon::parse($trajet['date'] )->locale('fr_FR')->isoFormat('LL'),
            'heure' => Carbon::parse($trajet['heure'])->format('H:i'),
            'prix' => $trajet['prix'] * $count,
            'nb' => $count,
            'user_name' => $user['name'],
            'user_photo' => $user['image_path']
                ? "storage/".$user['image_path']
                : 'https://ui-avatars.com/api/?size=235&name='. $user['name'],
        ]);

      //  dump($trip);

        return view('logged.achat_trajet', compact('trip', 'prefs', 'voiture','id', 'count'));
    }

    public function trajet_achete($t_id, $v_id)
    {
       /*  $trajet = Trajet::find($t_id);
        $voyage = Voyage::find($v_id);
        $user = User::where('id', $trajet->user_id)->first();

        $voiture = Vehicule::where('id',$trajet->voiture_id)->first();
        $prefs = Preference::where('user_id',$trajet->user_id)->first();
         

        $trip = collect($trajet)->merge([
            'ville_depart' => $trajet->ville_depart,
            'ville_destination' => $trajet->ville_destination,
            'date' => Carbon::parse($trajet->date)->locale('fr_FR')->isoFormat('LL'),
            'heure' => Carbon::parse($trajet->heure)->format('H:i'),
            'prix' => $trajet->prix,
            'date_achat' => Carbon::parse($voyage->save_date)->locale('fr_FR')->isoFormat('LL'),
            'montant' => $voyage->montant,
            'nbPassager' => $voyage->nbPassager,
            'user_name' => $user->name,
            'user_photo' => $user->image_path
                ? "storage/" . $user->image_path
                : 'https://ui-avatars.com/api/?size=235&name=' . $user->name,
        ]);

       dump($trip); */

        return view('logged.trajet_achete', compact('t_id', 'v_id'));
    }
}
