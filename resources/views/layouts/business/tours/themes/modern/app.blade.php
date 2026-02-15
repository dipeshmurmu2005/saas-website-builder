<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap"
        rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @livewireStyles

    @yield('seo')
</head>

<body class="font-primary">
    <livewire:business.tours.modern.nav-wire />
    {{ $slot }}
    <div class="fixed right-10 bottom-10">
        {{-- @if (settings('whatsapp_credentials') ? ['whatsapp_number'] : false)
            <a target="_blank" href="https://wa.me/{{ settings('whatsapp_credentials')['whatsapp_number'] }}">
                <button class="btn btn-xl btn-circle btn-success"><x-fab-whatsapp class="h-8 w-8" /></button>
            </a>
        @endif --}}
    </div>
    <livewire:business.tours.modern.footer-wire />
    @livewireScripts
</body>

</html>
