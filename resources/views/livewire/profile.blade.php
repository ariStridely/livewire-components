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

    <div class="mt-8 px-4 h-48">
        <x-chartjs :config="$chart" />

        <button wire:click="updateChart" wire:loading.attr="disabled" class="bg-blue-200">update chart</button>
    </div>
    
</div>
