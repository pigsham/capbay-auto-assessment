@extends('layouts.app')

@section('content')
    <div class="container mx-auto">
        <h1 class="text-center my-4 text-3xl font-semibold">Edit Appointment for {{ $car->model_name }}</h1>

        <!-- Back Button -->
        <div class="mb-4">
            <a href="{{ route('admin.appointments.index', $car->id) }}" class="inline-flex items-center py-2 px-4 text-white font-semibold rounded-lg shadow-md bg-gray-600 hover:bg-gray-700 focus:ring-2 focus:ring-gray-500 focus:ring-offset-2">
                ← Back to Appointments
            </a>
        </div>

        <form action="{{ route('admin.appointments.update', [$car->id, $appointment->id]) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Customer Name -->
            <div class="mb-4">
                <label for="customer_name" class="block text-sm font-medium text-gray-700">Customer Name</label>
                <input type="text" id="customer_name" name="customer_name" value="{{ old('customer_name', $appointment->customer_name) }}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('customer_name') border-red-500 @enderror">
                @error('customer_name')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Customer Phone -->
            <div class="mb-4">
                <label for="customer_phone" class="block text-sm font-medium text-gray-700">Customer Phone</label>
                <input type="text" id="customer_phone" name="customer_phone" value="{{ old('customer_phone', $appointment->customer_phone) }}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('customer_phone') border-red-500 @enderror">
                @error('customer_phone')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Appointment Date -->
            <div class="mb-4">
                <label for="appointment_date" class="block text-sm font-medium text-gray-700">Appointment Date</label>
                <input type="date" id="appointment_date" name="appointment_date" value="{{ old('appointment_date', \Carbon\Carbon::parse($appointment->appointment_date)->toDateString()) }}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('appointment_date') border-red-500 @enderror">
                @error('appointment_date')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Down Payment Percentage -->
            <div class="mb-4">
                <label for="down_payment_percentage" class="block text-sm font-medium text-gray-700">Down Payment Percentage</label>
                <input type="number" id="down_payment_percentage" name="down_payment_percentage" value="{{ old('down_payment_percentage', $appointment->down_payment_percentage) }}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('down_payment_percentage') border-red-500 @enderror">
                @error('down_payment_percentage')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Promotion Eligible -->
            <div class="mb-4">
                <label for="promotion_eligible" class="block text-sm font-medium text-gray-700">Promotion Eligible</label>
                <select id="promotion_eligible" name="promotion_eligible" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('promotion_eligible') border-red-500 @enderror">
                    <option value="1" {{ old('promotion_eligible', $appointment->promotion_eligible) == 1 ? 'selected' : '' }}>Yes</option>
                    <option value="0" {{ old('promotion_eligible', $appointment->promotion_eligible) == 0 ? 'selected' : '' }}>No</option>
                </select>
                @error('promotion_eligible')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Purchase Status -->
            <div class="mb-4">
                <label for="purchase_status" class="block text-sm font-medium text-gray-700">Purchase Status</label>
                <select id="purchase_status" name="purchase_status" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('purchase_status') border-red-500 @enderror">
                    <option value="1" {{ old('purchase_status', $appointment->purchase_status) == 1 ? 'selected' : '' }}>Purchased</option>
                    <option value="0" {{ old('purchase_status', $appointment->purchase_status) == 0 ? 'selected' : '' }}>Not Purchased</option>
                </select>
                @error('purchase_status')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Submit Button -->
            <button type="submit" class="w-full py-2 px-4 bg-indigo-600 text-white font-semibold rounded-lg shadow-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                Update Appointment
            </button>
        </form>
    </div>
@endsection