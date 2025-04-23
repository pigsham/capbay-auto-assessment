{{-- resources/views/admin/appointments/create.blade.php --}}
@extends('layouts.app')

@section('content')
    <div class="container mx-auto">
        <h1 class="text-center my-4 text-3xl font-semibold">
            Create Appointment for {{ $car->model_name }}
        </h1>

        {{-- Back link --}}
        <div class="mb-6">
            <a href="{{ route('admin.appointments.index', $car->id) }}"
               class="inline-block text-sm text-gray-600 hover:underline">
               ← Back to Appointments
            </a>
        </div>

        <form action="{{ route('admin.appointments.store', $car->id) }}" method="POST">
            @csrf
            {{-- keep track of which car --}}
            <input type="hidden" name="car_id" value="{{ $car->id }}">

            {{-- Customer Name --}}
            <div class="mb-4">
                <label for="customer_name" class="block text-sm font-medium text-gray-700">
                    Customer Name
                </label>
                <input
                    type="text"
                    id="customer_name"
                    name="customer_name"
                    value="{{ old('customer_name') }}"
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm
                           focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm
                           @error('customer_name') border-red-500 @enderror"
                >
                @error('customer_name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Customer Email --}}
            <div class="mb-4">
                <label for="customer_email" class="block text-sm font-medium text-gray-700">
                    Customer Email
                </label>
                <input
                    type="email"
                    id="customer_email"
                    name="customer_email"
                    value="{{ old('customer_email') }}"
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm
                           focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm
                           @error('customer_email') border-red-500 @enderror"
                >
                @error('customer_email')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Customer Phone --}}
            <div class="mb-4">
                <label for="customer_phone" class="block text-sm font-medium text-gray-700">
                    Customer Phone
                </label>
                <input
                    type="text"
                    id="customer_phone"
                    name="customer_phone"
                    value="{{ old('customer_phone') }}"
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm
                           focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm
                           @error('customer_phone') border-red-500 @enderror"
                >
                @error('customer_phone')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Appointment Date --}}
            <div class="mb-4">
                <label for="appointment_date" class="block text-sm font-medium text-gray-700">
                    Appointment Date
                </label>
                <input
                    type="date"
                    id="appointment_date"
                    name="appointment_date"
                    value="{{ old('appointment_date') }}"
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm
                           focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm
                           @error('appointment_date') border-red-500 @enderror"
                >
                @error('appointment_date')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Down Payment Amount --}}
            <div class="mb-4">
                <label for="down_payment_amount" class="block text-sm font-medium text-gray-700">
                    Down Payment Amount (RM)
                </label>
                <input
                    type="number"
                    step="0.01"
                    id="down_payment_amount"
                    name="down_payment_amount"
                    value="{{ old('down_payment_amount', 0) }}"
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm
                           focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm
                           @error('down_payment_amount') border-red-500 @enderror"
                >
                @error('down_payment_amount')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Submit --}}
            <button
                type="submit"
                class="w-full py-2 px-4 bg-indigo-600 text-white font-semibold rounded-lg shadow-md
                       hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
            >
                Create Appointment
            </button>
        </form>
    </div>
@endsection