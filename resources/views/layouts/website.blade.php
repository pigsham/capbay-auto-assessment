<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'CapBay Auto') }}</title>
  @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body class="flex flex-col min-h-screen bg-gray-100 font-sans antialiased">

  <!-- NAV: now teal -->
  <nav class="bg-gray-800 p-4">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            <div class="text-white text-2xl font-semibold">CapBay Auto</div>
        </div>
    </nav>

  <!-- PAGE CONTENT -->
  <main class="flex-grow">
    @yield('content')
  </main>

  <!-- FOOTER sticks to bottom -->
  <footer class="bg-gray-800 text-white py-4">
    <div class="max-w-7xl mx-auto text-center">
      © {{ date('Y') }} CapBay Auto. All rights reserved.
    </div>
  </footer>

</body>
</html>