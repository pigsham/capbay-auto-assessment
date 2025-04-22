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
            <a href="{{ route('admin.viewAppointments', $car->id) }}" class="btn btn-primary">View Appointments</a>
            <a href="{{ route('admin.editCar', $car->id) }}" class="btn btn-warning">Edit</a>
            <form action="{{ route('admin.deleteCar', $car->id) }}" method="POST" style="display: inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </div>
    @endforeach
@endsection