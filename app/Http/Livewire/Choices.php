<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Choices extends Component
{
    public function fetchNewOptions()
    {
        $this->dispatchBrowserEvent('update-choices-options', [
            'ref' => 'projectIds',
            'options' => [
                [
                    'value' => $number = rand(1, 100),
                    'label' => "{$number}",
                    'selected' => true,
                ],
                [
                    'value' => $number = rand(1, 100),
                    'label' => "{$number}",
                    'selected' => true,
                ],
            ]
        ]);
    }

    public function render()
    {
        return view('livewire.choices');
    }
}
