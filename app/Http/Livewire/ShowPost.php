<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ShowPost extends Component
{
    public $pageIsReady = false;

    public function fetchPosts()
    {
        sleep(2);
        $posts = collect([
            'post 1',
            'post 2',
            'post 3',

        ]);
        // User::all();

        $this->pageIsReady = true;

        return $posts;
    }

    public function render()
    {
        return view('livewire.show-post', [
            'posts' => $this->pageIsReady
                ? $this->fetchPosts()
                : collect([]),
        ]);
    }
}
