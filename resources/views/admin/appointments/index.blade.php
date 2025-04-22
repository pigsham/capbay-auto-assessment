@extends('layouts.app')

@section('content')
    <div class="container mx-auto">
        <h1 class="text-center my-4 text-3xl font-semibold">Appointments for {{ $car->model_name }}</h1>
        <!-- Back Button -->
        <div class="mb-4">
            <a href="{{ route('admin.cars.index') }}" class="inline-flex items-center py-2 px-4 text-white font-semibold rounded-lg shadow-md bg-gray-600 hover:bg-gray-700 focus:ring-2 focus:ring-gray-500 focus:ring-offset-2">
                ← Back to Cars
            </a>
        </div>
        @if($appointments->count() > 0)
            <div class="overflow-x-auto bg-white shadow-lg rounded-lg">
                <table class="min-w-full w-full table-auto border-collapse">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-6 py-3 text-left text-sm font-medium text-gray-500 uppercase tracking-wider">Customer Name</th>
                            <th class="px-6 py-3 text-left text-sm font-medium text-gray-500 uppercase tracking-wider">Customer Phone</th>
                            <th class="px-6 py-3 text-left text-sm font-medium text-gray-500 uppercase tracking-wider">Appointment Date</th>
                            <th class="px-6 py-3 text-left text-sm font-medium text-gray-500 uppercase tracking-wider">Down Payment (%)</th>
                            <th class="px-6 py-3 text-left text-sm font-medium text-gray-500 uppercase tracking-wider">Promotion Eligible</th>
                            <th class="px-6 py-3 text-left text-sm font-medium text-gray-500 uppercase tracking-wider">Purchase Status</th>
                            <th class="px-6 py-3 text-left text-sm font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white">
                        @foreach($appointments as $appointment)
                            <tr class="border-t hover:bg-gray-50">
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $appointment->customer_name }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $appointment->customer_phone }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $appointment->appointment_date }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $appointment->down_payment_percentage }}%</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    @if($appointment->promotion_eligible)
                                        Yes
                                    @else
                                        No
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    @if($appointment->purchase_status)
                                        Purchased
                                    @else
                                        Not Purchased
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <a href="{{ route('admin.appointments.edit', ['carId' => $car->id, 'appointmentId' => $appointment->id]) }}" class="text-blue-600 hover:text-blue-700 mr-12">
                                        Edit
                                    </a>

                                    <!-- Separator (|) -->
                                    <span class="mx-2">|</span>

                                    <!-- Delete Button -->
                                    <form action="{{ route('admin.appointments.destroy', ['carId' => $car->id, 'appointmentId' => $appointment->id]) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-700">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <p>No appointments found for this car.</p>
        @endif
    </div>
@endsection