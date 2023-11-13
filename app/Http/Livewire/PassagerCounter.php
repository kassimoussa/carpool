<?php

namespace App\Http\Livewire;

use Livewire\Component;

class PassagerCounter extends Component
{
    public $count = 1;
    public $hidden = "hidden";
    public $text = "Passager";

    public function delhide()
    {
        if ($this->hidden == "hidden") {
            $this->hidden = "";
        } else {
            $this->hidden = "hidden";
        }
    }

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

    public function render()
    {
        if ($this->count > 1) {
            $this->text = "Passagers";
        } elseif ($this->count == 1) {
            $this->text = "Passager";
        }
        return view('livewire.passager-counter');
    }
}
