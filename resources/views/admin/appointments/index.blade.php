@extends('layouts.app')

@section('content')
    <h1 class="text-center mb-4">Appointments for {{ $car->model_name }}</h1>

    @foreach($appointments as $appointment)
        <div class="p-4 mb-4 border border-gray-300 rounded-md">
            <p><strong>Customer Name:</strong> {{ $appointment->customer_name }}</p>
            <p><strong>Email:</strong> {{ $appointment->customer_email }}</p>
            <p><strong>Phone:</strong> {{ $appointment->customer_phone }}</p>
            <p><strong>Appointment Date:</strong> {{ $appointment->appointment_date }}</p>
            <p><strong>Down Payment:</strong> {{ $appointment->down_payment_percentage }}%</p>
            <p><strong>Promotion Eligible:</strong> {{ $appointment->promotion_eligible ? 'Yes' : 'No' }}</p>
        </div>
    @endforeach
@endsection