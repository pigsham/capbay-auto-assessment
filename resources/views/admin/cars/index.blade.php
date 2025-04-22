@extends('layouts.app')

@section('content')
    <h1 class="text-center mb-4">Car Listings</h1>

    @foreach($cars as $car)
        <div class="p-4 mb-4 border border-gray-300 rounded-md">
            <img src="{{ asset($car->image_url) }}" alt="{{ $car->model_name }}" class="w-32 h-32 object-cover mb-2">
            <p><strong>Model Name:</strong> {{ $car->model_name }}</p>
            <p><strong>Price:</strong> RM {{ number_format($car->price, 2) }}</p>
            <p><strong>Available Units:</strong> {{ $car->available_units }}</p>
            <p><strong>Description:</strong> {{ $car->description }}</p>
        </div>
    @endforeach
@endsection