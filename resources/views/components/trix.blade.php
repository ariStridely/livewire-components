@props([
    'modifiers' => $attributes->wire('model')->modifiers()->isEmpty() 
        ? ''
        : '.' . implode('.', $attributes->wire('model')->modifiers()->toArray()),
])

<div 
    x-data="{ value: @entangle($attributes->wire('model')) }"
    x-init="$refs.trix_editor.editor.loadHTML(value)"
    x-on:trix-change{{ $modifiers }}="value = $refs.trix_input.value"
    x-id="['trix']"
    wire:ignore
>
    {{-- @dump($attributes->wire('model')->modifiers()) --}}
    <input type="hidden" x-ref="trix_input" :id="$id('trix')">
    <trix-editor x-ref="trix_editor" :input="$id('trix')"></trix-editor>

    <div x-html="value"></div>
</div>

@once
    @push('styles')
        <link rel="stylesheet" href="https://unpkg.com/trix@2.0.0-alpha.1/dist/trix.css"></link>
    @endpush

    @push('scripts')
        <script src="https://unpkg.com/trix@2.0.0-alpha.1/dist/trix.umd.js"></script>
    @endpush
@endonce