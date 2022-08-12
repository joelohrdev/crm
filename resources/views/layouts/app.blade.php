<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-gray-100">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@300;400;600;700;900&display=swap">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles
    <style>[x-cloak] { display: none !important; }</style>
</head>
<body class="font-sans antialiased h-full">
<div class="min-h-full">
    <x-desktop-sidebar.mobile-nav/>
    <x-desktop-sidebar.desktop-sidebar/>
    <div class="lg:pl-64 flex flex-col flex-1">
        <div class="relative z-10 flex-shrink-0 flex h-16 bg-white border-b border-gray-200 lg:border-none">
            <x-search-bar.search-bar/>
        </div>
        <main class="flex-1 pb-8">
            {{ $slot }}
        </main>
    </div>
</div>
@livewireScripts
@livewire('notifications')
</body>
</html>
