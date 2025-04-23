{{-- resources/views/welcome.blade.php --}}
@extends('layouts.website')

@section('content')
    <div class="relative bg-[url('/images/hero-bg.jpg')] bg-center bg-cover h-[60vh] flex items-center justify-center">
        <div class="bg-black/50 p-8 rounded-lg text-center text-white max-w-2xl">
            <h1 class="text-4xl font-bold mb-4">Welcome to CapBay Auto</h1>
            <p class="mb-6">Discover your dream ride. Browse our latest models and book a test drive today!</p>
            <a href="{{ route('cars.website_index') }}"
               class="inline-block bg-green-600 hover:bg-green-700 text-white font-semibold py-3 px-6 rounded-lg transition">
                View Available Cars
            </a>
        </div>
    </div>

    <div class="container mx-auto py-12 px-4">
        <h2 class="text-2xl font-semibold mb-6 text-center">Why Choose CapBay?</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="text-center">
                <h3 class="font-semibold mb-2">Top Brands</h3>
                <p class="text-gray-600">
                    We carry only the best—from sedans to SUVs, find your perfect match.
                </p>
            </div>
            <div class="text-center">
                <h3 class="font-semibold mb-2">Easy Booking</h3>
                <p class="text-gray-600">
                    Just pick a car, choose a date—and we’ll reserve it for you.
                </p>
            </div>
            <div class="text-center">
                <h3 class="font-semibold mb-2">Great Deals</h3>
                <p class="text-gray-600">
                    Enjoy competitive pricing and exclusive promotions.
                </p>
            </div>
        </div>
    </div>
@endsection