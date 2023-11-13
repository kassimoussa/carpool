<?php

namespace App\Http\Livewire;

use App\Models\Preference;
use App\Models\User;
use Carbon\Carbon;
use Livewire\Component;

class UserProfil extends Component
{
    public $user;

    public function mount($user_id)
    {
        $user = User::find($user_id);
        $prefs = Preference::where('user_id', $user_id)->first();


        $this->user = collect($user)->merge([
            'name' => $user['name'],
            'age'  => Carbon::parse($user['birthdate'])->age,
            'photo' => $user['image_path']
                ? "storage/" . $user['image_path']
                : 'https://ui-avatars.com/api/?size=235&name=' . $user['name'],
            "pbool" => ($prefs['discussion'] == null && $prefs['musique'] == null && $prefs['cigarette'] == null) ? false : true,
            "discussion" => $prefs['discussion'],
            "musique" => $prefs['musique'],
            "cigarette" => $prefs['cigarette'],
        ]);
    }

    public function render()
    {
        return view('livewire.user-profil');
    }
}
