<?php

namespace App\Http\Livewire\Select\Demo;

use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Component;

class Choices extends Component
{
    use WithFaker;

    public function fetchNewOptions()
    {
        $faker = $this->makeFaker();

        $this->dispatchBrowserEvent('update-choices-options', [
            'ref' => 'websiteIds',
            'options' => [
                [
                    'value' => $name = $faker->name,
                    'label' => "{$name}",
                    'selected' => true,
                ],
                [
                    'value' => $name = $faker->name,
                    'label' => "{$name}",
                    'selected' => true,
                ],
            ]
        ]);
    }

    public function render()
    {
        return view('livewire.select.demo.choices');
    }
}
