<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Livewire Components</title>

    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        [x-cloak] { display: none !important; }
    </style>
    
    @livewireStyles
    @stack('styles')
</head>
<body>
    
    <div class="max-w-xl mt-8 mx-auto">
        {{ $slot }}
    </div>

    @livewireScripts
    @stack('scripts')
</body>
</html>