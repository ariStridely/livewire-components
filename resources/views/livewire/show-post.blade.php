<div wire:init="fetchPosts">
    @if(! $pageIsReady)
        Caricamento
    @else
        <ul>
            @foreach($posts as $post)
                <li>{{ $post }}</li>
            @endforeach
        </ul>
    @endif

    <div class="bg-red-200">
        ehi there!
    </div>
</div>
