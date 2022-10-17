<div>
    
    <x-choices 
        id="projectIds"
        multiple
        remote-url="http://livewire-components.test/api/users"
        extra-config="{
            removeItemButton: true,
            searchResultLimit: 10,
        }"
    />

    <x-choices 
        id="websiteIds"
        {{-- multiple --}}
        extra-config="{
            removeItemButton: true,
            searchResultLimit: 10,
        }"
    />

    <button 
        wire:click="fetchNewOptions"
        class="bg-blue-200 py-2 px-4"
    >Add</button>
    

    <script>
        
    </script>
</div>
