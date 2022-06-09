@props([
    'id',
])

@php
    $multiple = $attributes['multiple'] ?? false;
    $extraConfig = $attributes['extra-config'] ?? '{}';
@endphp

<div
    wire:ignore
    x-cloak
    x-data="{
        value: [],
        multiple: Boolean({{ $multiple }}),
        options: [
            { value: 1, label: 'One' },
            { value: 2, label: 'Two' },
            { value: 3, label: 'Three' },
        ],

        extraConfig: {{ $extraConfig }},

        init() {
            this.$nextTick(() => {
                let choices = new Choices(this.$refs.select, {
                    searchEnabled: false,
                    ...this.extraConfig
                });

                let refreshChoices = () => {
                    let selection = this.multiple ? this.value : [this.value];
                    console.log('refreshing', this.options);
                    
                    choices.clearStore();
                    choices.setChoices(
                        this.options.map( ({ value, label }) => ({
                            value,
                            label,
                            selected: selection.includes(value),
                        }))
                    );
                    console.log(choices);
                }

                refreshChoices();

                this.$refs.select.addEventListener('change', () => {
                    this.value = choices.getValue(true) || null;
                });

                this.$watch('value', () => refreshChoices());
                this.$watch('options', () => refreshChoices());
            });
        },

        updateOptions(event) {
            if (event.detail.ref != '{{ $id }}') return;

            this.options = event.detail.options;
        }
    }"
    x-on:update-choices-options.window="updateOptions($event);"
>
    <select 
        x-ref=select
        :multiple="multiple"
    ></select>

    <div>Selected: <span x-text="JSON.stringify(value)"></span></div>

    <div>
        <button @click="value = 3">Change to three</button>
    </div>
    <div>
        <button @click="options.push({ value: 4, label: 'Four'})">Add four</button>
    </div>
</div>

@once
    @push('styles')
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/choices.min.css" />
        
    @endpush

    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js"></script>        
    @endpush
@endonce