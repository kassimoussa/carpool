<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Http\Livewire\Modal;

class WelcomeModal extends Modal
{
    public $message = '';

    public function mount()
    {
        $this->message = 'Welcome to the reusable modal example';
    }

    public function render()
    {
        return view('livewire.welcome-modal');
    }
}
