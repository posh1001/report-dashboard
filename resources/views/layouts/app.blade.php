<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-gray-100 dark:bg-gray-900">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', config('app.name'))</title>

    <!-- Tailwind CSS -->
    @vite('resources/css/app.css')

    <!-- Livewire Styles -->
    @livewireStyles
</head>
<body class="h-full text-gray-900 dark:text-gray-100 font-sans antialiased">

    <div class="min-h-screen flex flex-col">

        <!-- Header -->

        <!-- Main Content -->
        <main class="flex-1 overflow-auto p-6">
            @yield('content')
        </main>

    </div>

    <!-- Livewire Scripts -->
    @livewireScripts
</body>
</html>
