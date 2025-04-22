@extends('layouts.app')

@section('content')
    <div class="container mx-auto">
        <h1 class="text-center my-4 text-3xl font-semibold">Available Cars</h1>

        <!-- Add New Car Button -->
        <div class="w-full text-right mb-3">
            <a href="{{ route('admin.cars.create') }}" class="inline-flex items-center py-2 px-4 text-white font-semibold rounded-lg shadow-md, mt-8" 
            style="background-color: #34D399; hover:bg-green-600; focus:ring: 2px solid #10B981;">
            <span class="mr-2">+</span> Add Car
            </a>
        </div>

        @if($cars->count() > 0)
            <div class="overflow-x-auto bg-white shadow-lg rounded-lg">
                <table class="min-w-full w-full table-auto border-collapse">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="px-6 py-3 text-left text-sm font-medium text-gray-500 uppercase tracking-wider">Model Name</th>
                            <th class="px-6 py-3 text-left text-sm font-medium text-gray-500 uppercase tracking-wider">Brand</th>
                            <th class="px-6 py-3 text-left text-sm font-medium text-gray-500 uppercase tracking-wider">Price (RM)</th>
                            <th class="px-6 py-3 text-left text-sm font-medium text-gray-500 uppercase tracking-wider">Available Units</th>
                            <th class="px-6 py-3 text-left text-sm font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white">
                        @foreach($cars as $car)
                            <tr class="border-t hover:bg-gray-50">
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $car->model_name }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $car->brand }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ number_format($car->price, 2) }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $car->available_units }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <a href="{{ route('admin.cars.edit', $car->id) }}" class="text-yellow-600 hover:text-yellow-700">Edit</a>
                                    <span class="mx-2">|</span>
                                    <form action="{{ route('admin.cars.destroy', $car->id) }}" method="POST" style="display:inline;">
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
            <p>No cars available at the moment.</p>
        @endif
    </div>
@endsection