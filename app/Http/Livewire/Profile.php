<?php

namespace App\Http\Livewire;

use App\ChartBuilder;
use Livewire\Component;

class Profile extends Component
{
    public $description = 'Hi, my name is David!';
    public $color;

    public function submit()
    {
        dd($this);
    }

    public function updateChart()
    {
        $this->dispatchBrowserEvent('chart-update', [
            'chart' => resolve(ChartBuilder::class)->handle(),
        ]);
    }

    public function render()
    {
        return view('livewire.profile', [
            'chart' => resolve(ChartBuilder::class)->handle(),
        ]);
    }
}
