<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Profile extends Component
{
    public $description = 'Hi, my name is David!';
    public $color;

    public function submit()
    {
        dd($this);
    }

    public function render()
    {
        return view('livewire.profile');
    }
}
