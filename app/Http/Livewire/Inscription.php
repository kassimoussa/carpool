<?php

namespace App\Http\Livewire;

use App\Models\Preference;
use Livewire\Component;
use Carbon\Carbon;
use App\Models\User;
use Livewire\WithFileUploads;

class Inscription extends Component
{
    use WithFileUploads;

    public $audj;
    public $name;
    public $birthdate;
    public $phone;
    public $email;
    public $password;
    public $confirm_password;
    public $sexe;
    public $image;
    
    public $currentStep = 1;
    public $totalStep = 4;
    public $errorMsg = "Ce champ ne doit etre vide !";
    public $errorColor ="ring-2 ring-red-700 ring-inset";


    public function mount()
    {
        $this->audj = Carbon::today()->format('Y-m-d');
    }

    protected $rules = [
        'name' => 'required',
        'sexe' => 'required',
        'email' => 'required|email|unique:users',
        'birthdate' => 'required',
        'phone' => 'required|min:8|max:8|unique:users',
        'password' => 'required|min:8',
        'confirm_password' => 'required|same:password|min:8',
        'image' => 'image|max:1024',
    ];

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
                'email' => 'required|email|unique:users',
            ]);
        }
        elseif ($this->currentStep == 2) 
        {
            $this->validate([
                'name' => 'required',
                'sexe'=> 'required',
            ]);
        }  
        elseif ($this->currentStep == 3) 
        {
            $this->validate([
                'birthdate' => 'required',
                'phone' => 'required|min:8|max:8|unique:users',
            ]);
        } 
    }


    public function save_user()
    {
        $this->resetErrorBag();
        if ($this->currentStep == 4) 
        {
            $this->validate([
                'password' => 'required|min:6',
                'confirm_password' => 'required|same:password|min:8',
            ]);
        }  

        if($this->image)
        {
           $url = $this->image->store('profils', 'public');
        } else { $url = null;}

        $user = new User();
        $user->name = $this->name;
        $user->email = $this->email;  
        $user->birthdate = $this->birthdate; 
        $user->phone = $this->phone;
        $user->password = $this->password;  
        $user->image_path = $url;
        $query = $user->save();
        
        $user_id =  $user->id;
        $prefs = new Preference();
        $prefs->user_id = $user_id;
        $query2 = $prefs->save();

        if ($query && $query2) {
            return redirect('login')->with('success', "Inscription réussi !!!");
        } else {
            return back()->with('fail', "Echec de l'inscription !!!");
        }
    }

    public function render()
    {
        return view('livewire.inscription');
    }
}
