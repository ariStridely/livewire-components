<div>
    <h1>Edit your profile description</h1>
    
    <form wire:submit.prevent="submit">

        <x-trix 
            wire:model.debounce.3000ms="description" 
        />

        <x-color-picker 
            wire:model="color"
        />

        <button>Save</button>
    </form>
    
</div>
