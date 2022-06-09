<div
    x-data="{ color: '#ffffff' }"
    x-init="
        picker = new Picker({
            parent: $refs.button,
            alpha: false,
        });
        picker.onDone = rawColor => {
            console.log(rawColor);
            color = rawColor.hex;
            $dispatch('input', color)
        }
    "
    wire:ignore
    {{ $attributes }}
>
    <span x-text="color" :style="`background: ${color}`"></span>
    <button x-ref="button">Change</button>
</div>  


@once
    @push('scripts')
        <script src="https://unpkg.com/vanilla-picker@2"></script>
    @endpush
@endonce