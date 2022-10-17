@props([
    'id',
])

@php
    $multiple = $attributes['multiple'] ?? false;
    $remoteUrl = $attributes['remote-url'] ?? '';
    $extraConfig = $attributes['extra-config'] ?? '{}';
@endphp

<div
    wire:ignore
    x-cloak
    x-data="selectChoices(
        '{{ $remoteUrl }}',
        '{{ $id }}',
        {{ $multiple ? 'true' : 'false' }} 
    )"
    
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
@endonce

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js"></script>        

    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('selectChoices', (remoteUrl = '', id, multiple = false) => ({
                choices: null,
                search: '',
                value: [],
                multiple: Boolean(multiple),
                options: [],
                remoteUrl: remoteUrl,
                id: id,

                extraConfig: {{ $extraConfig }},

                init() {
                    this.$nextTick(() => {

                        //  choices initialization
                        this.choices = new Choices(this.$refs.select, {
                            noChoicesText: () => {
                                if (this.options.length >= 0 && this.search != '') {
                                    return 'No results found';
                                }

                                return 'Please select 1 or more character';
                            },
                            searchFloor: 0,
                            searchChoices: this.multiple ? false : true,
                            ...this.extraConfig
                        });

                        //  Define inner functions
                        let refreshChoices = () => {
                            let selection = this.multiple ? this.value : [this.value];

                            this.choices.clearStore();
                            this.choices.setChoices(
                                this.options.map( ({ value, label }) => ({
                                    value,
                                    label,
                                    selected: selection.includes(value),
                                }))
                            );
                        }

                        let getOptions = async (q) => {
                            let url = this.remoteUrl;
                            let response = await fetch(url);
                            let data = await response.json(); // read response body and parse as JSON

                            return data;
                        }

                        //  Una tantum call refreshChoices
                        refreshChoices();

                        //  Add event listeners
                        if (this.remoteUrl) {
                            this.$refs.select.addEventListener(
                                'search', 
                                _.debounce(async (event) => {
                                    //  chiamata api con termine di ricerca
                                    let q = event.detail.value;
                                    this.search = q;

                                    //  clear options list if canc search term
                                    if (q == '') {
                                        let valueObject = this.choices.getValue();

                                        if (!this.multiple) {
                                            valueObject = valueObject ? [valueObject] : [];
                                        }

                                        this.options = valueObject;

                                        return;
                                    }

                                    let data = await getOptions(q);

                                    //  ci sono options selezionate?
                                    let selectedOptions = this.choices.getValue();
                                    let selectedOptionsIds = this.choices.getValue(true);

                                    if (!this.multiple) {
                                        selectedOptions = selectedOptions ? [selectedOptions] : [];
                                        selectedOptionsIds = selectedOptionsIds ? [selectedOptionsIds] : [];
                                    }

                                    //  escludi da risultato api quelli già selezionati
                                    let filtered = data.filter((model) => {
                                        return !selectedOptionsIds.includes(model.value);
                                    });

                                    this.options = selectedOptions.concat(filtered);
                                }, 1000)
                            );
                        }

                        if (this.remoteUrl) {
                            this.$refs.select.addEventListener('change', () => {
                                this.value = this.choices.getValue(true) || null;
                                let valueObject = this.choices.getValue();

                                if (!this.multiple) {
                                    valueObject = valueObject ? [valueObject] : [];
                                }

                                this.search = '';
                                this.options = valueObject;
                            });
                        } else {
                            this.$refs.select.addEventListener('change', () => {
                                this.value = this.choices.getValue(true) || null;
                            });
                        }

                        //  Add watchers
                        this.$watch('value', () => refreshChoices());
                        this.$watch('options', () => refreshChoices());

                    });
                },

                //  Add AlpineJS function listeners
                updateOptions(event) {
                    if (event.detail.ref != id) return;

                    this.options = event.detail.options;
                },
            }))
        })
    </script>
@endpush