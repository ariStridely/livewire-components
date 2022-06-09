<div>
    
    <x-choices 
        id="projectIds"
        multiple
        extra-config="{
            removeItemButton: true
        }"
    />

    <x-choices 
        id="websiteIds"
        multiple
        extra-config="{
            removeItemButton: true
        }"
    />

    <button 
        wire:click="fetchNewOptions"
        class="bg-blue-200 py-2 px-4"
    >Add</button>
    
</div>
