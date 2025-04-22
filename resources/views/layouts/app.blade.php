<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'CapBay Auto') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-gray-200"> <!-- Apply background color to the whole body -->

    <!-- Navigation Bar -->
    @if(auth()->check())
        <nav class="bg-gray-800 p-4">
            <div class="max-w-7xl mx-auto flex justify-between items-center">
                <div class="text-white text-2xl font-semibold">CapBay Auto Admin</div>
                <div class="space-x-4">
                    <a href="{{ route('admin.cars.index') }}" class="text-white hover:bg-gray-700 px-4 py-2 rounded-md transition">Cars</a>
                    <form action="{{ route('admin.logout.submit') }}" method="POST" style="display: inline;">
                        @csrf
                        <button type="submit" class="text-white hover:bg-gray-700 px-4 py-2 rounded-md transition">Logout</button>
                    </form>
                </div>
            </div>
        </nav>
    @endif

    <div class="min-h-screen bg-gray-200"> <!-- This ensures the background color applies across the page -->

        <!-- Page Heading -->
        @isset($header)
            <header class="bg-white dark:bg-gray-800 shadow mb-8">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    <h1 class="text-3xl font-bold text-gray-800 dark:text-gray-200">{{ $header }}</h1>
                </div>
            </header>
        @endisset

        <!-- Page Content -->
        <main class="container mx-auto px-4 py-6">
            @yield('content')  <!-- This is where content will be injected from child views -->
        </main>
    </div>

</body>
</html>