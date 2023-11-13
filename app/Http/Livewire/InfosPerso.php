<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\Preference;
use Livewire\Component;
use Carbon\Carbon;

class InfosPerso extends Component
{

    public $name, $newNom;
    public $birthdate; public $formatedBirthdate;
    public $sexe;
    public $phone;
    public $email; 
    public $user;
    public $user_id;

    public $discussion ;
    public $musique ;
    public $cigarette ;

    public function mount()
    {
        $this->user_id = session('id');

        $this->user = User::find($this->user_id);

        $this->name = $this->user->name;
        $this->formatedBirthdate = Carbon::parse($this->user->birthdate)->format('d/m/Y');
        $this->birthdate = $this->user->birthdate;
        $this->sexe = $this->user->sexe;
        $this->phone = $this->user->phone;
        $this->email = $this->user->email;

        $prefs = Preference::where('user_id',$this->user_id)->first(); 
        $this->discussion = $prefs->discussion;
        $this->musique = $prefs->musique;
        $this->cigarette = $prefs->cigarette; 
        
    }

    protected $rules = [
        'name' => 'required|min:6',
        'email' => 'required|email|unique:users',
        'birthdate' => 'required',
        'sexe' => 'required',
        'phone' => 'required|min:8|max:8|unique:users', 
    ];

    public function save()
    { 
        $user = User::find($this->user_id);
        
        $query = $user->update([
            'name' => $this->name, 
            'email' => $this->email, 
            'birthdate' => $this->birthdate, 
            'sexe' => $this->sexe, 
            'phone' => $this->phone, 
        ]);

        return redirect('profil/infos_perso');
    }

    public function render()
    {
        return view('livewire.infos-perso');
    }
}
