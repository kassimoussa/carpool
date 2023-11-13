<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Preference;
use Carbon\Carbon;

class Preferences extends Component
{
    public $discussion, $discussion2;
    public $musique, $musique2;
    public $cigarette, $cigarette2;
    public $prefs;
    public $user_id;
    public $prefs_id;

    public function mount()
    {
        $this->user_id = session('id');

        $this->prefs = Preference::where('user_id',$this->user_id)->first();
 
        $this->prefs_id = $this->prefs->prefs_id;
        $this->discussion2 = $this->discussion = $this->prefs->discussion;
        $this->musique2 = $this->musique = $this->prefs->musique;
        $this->cigarette2 = $this->cigarette = $this->prefs->cigarette; 
        
    }

    public function edit()
    { 
        $this->discussion2 = $this->discussion ;
        $this->musique2 = $this->musique ;
        $this->cigarette2 = $this->cigarette ; 
    } 
    
    public function save()
    {
        $prefs =  Preference::where('user_id',$this->user_id)->first();
        $this->discussion = $this->discussion2;  
        $this->musique = $this->musique2;  
        $this->cigarette = $this->cigarette2;  

        $query = $prefs->update([
            'discussion' => $this->discussion2, 
            'musique' => $this->musique2,  
            'cigarette' => $this->cigarette2,  
        ]);
        
    }

    public function render()
    {
        return view('livewire.preferences');
    }
}
