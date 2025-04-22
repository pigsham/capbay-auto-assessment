@extends('layouts.app')

@section('content')
    <div class="container mx-auto">
        <h1 class="text-center my-4 text-3xl font-semibold">Create Appointment for {{ $car->model_name }}</h1>

        <form action="{{ route('admin.appointments.store', $car->id) }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="customer_name" class="block text-sm font-medium text-gray-700">Customer Name</label>
                <input type="text" id="customer_name" name="customer_name" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('customer_name') border-red-500 @enderror" value="{{ old('customer_name') }}">
                @error('customer_name')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="customer_phone" class="block text-sm font-medium text-gray-700">Customer Phone</label>
                <input type="text" id="customer_phone" name="customer_phone" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('customer_phone') border-red-500 @enderror" value="{{ old('customer_phone') }}">
                @error('customer_phone')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="appointment_date" class="block text-sm font-medium text-gray-700">Appointment Date</label>
                <input type="date" id="appointment_date" name="appointment_date" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('appointment_date') border-red-500 @enderror" value="{{ old('appointment_date') }}">
                @error('appointment_date')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="down_payment_percentage" class="block text-sm font-medium text-gray-700">Down Payment Percentage</label>
                <input type="number" id="down_payment_percentage" name="down_payment_percentage" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('down_payment_percentage') border-red-500 @enderror" value="{{ old('down_payment_percentage') }}">
                @error('down_payment_percentage')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Other fields as needed -->

            <button type="submit" class="w-full py-2 px-4 bg-indigo-600 text-white font-semibold rounded-lg shadow-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                Create Appointment
            </button>
        </form>
    </div>
@endsection