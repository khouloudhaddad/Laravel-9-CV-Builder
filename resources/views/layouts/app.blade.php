<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">

        <meta name="application-name" content="{{ config('app.name') }}">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name') }}</title>

        <!-- Styles -->
        <style>[x-cloak] { display: none !important; }</style>
        @livewireStyles
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <link href="https://cdn.jsdelivr.net/npm/izitoast@1.4.0/dist/css/iziToast.min.css" rel="stylesheet" type="text/css" />


    </head>

    <body class="antialiased">
        @include('layouts.navigation')
        {{ $slot }}


         <!-- Scripts -->
        @livewireScripts
        <script src="{{ mix('js/app.js') }}" defer></script>
        <script src="https://cdn.jsdelivr.net/npm/izitoast@1.4.0/dist/js/iziToast.min.js">
        @stack('scripts')
         <x-livewire-notification::toast />
    </body>
</html>
