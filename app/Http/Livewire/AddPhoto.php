<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class AddPhoto extends Component
{
    use WithFileUploads;
    public $url ;
    public $photo ;
    public $saveButton;

    public function mount()
    {
        $this->url = session('image');
        
        $this->saveButton = false ;
    }

    public function updated()
    {
        $this->url =  $this->photo->temporaryUrl();
        $this->saveButton = true ;
    }
 
    protected $rules = [ 
        'image' => 'image|max:1024',
    ];

    public function save()
    {
        $user = User::where('id', session('id'))->first();
        $old_image_path = $user->image_path;
        if($old_image_path != null)
        {
            Storage::delete("public/".$old_image_path); 
        }
        $newImage = $this->photo->store('profils', 'public');
        session()->forget('image');
        session()->forget('profil');
        session()->put('image', "storage/".$newImage); 
        $user->update(['image_path' => $newImage]);

        return redirect('profil');
    }

    public function render()
    {
        return view('livewire.add-photo');
    }
}
