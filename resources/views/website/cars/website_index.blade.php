@extends('layouts.website')

@section('content')
    <div class="container mx-auto py-6 px-4">
        <h2 class="text-center text-3xl font-semibold mb-6">Available Cars</h2>

        <div class="space-y-6">
            @foreach($cars as $car)
                <div class="bg-white shadow-lg rounded-lg p-6 flex items-center">
                    <!-- Car Image -->
                    <div class="w-1/4">
                        <img src="{{ asset($car->image_url) }}"
                             alt="{{ $car->model_name }}"
                             class="w-full h-40 object-cover rounded-md">
                    </div>
                    
                    <!-- Car Description -->
                    <div class="flex-grow px-6">
                        <h3 class="text-lg font-semibold">{{ $car->model_name }}</h3>
                        <p class="text-sm text-gray-600">
                            {{ Str::limit($car->description, 100) }}
                        </p>
                    </div>

                    <!-- Action Box -->
                    <div class="ml-4 text-right">
                        <h3 class="text-lg font-semibold">RM {{ number_format($car->price,2) }}</h3>
                        <div class="mt-2">
                            <a href="{{ route('appointments.create', $car->id) }}"
                               class="inline-block border-2 border-blue-600 bg-yellow text-blue-600 font-semibold rounded-lg px-4 py-2 hover:bg-blue-50 transition-shadow shadow-sm hover:shadow-md">
                                REGISTER FOR A TEST DRIVE NOW!
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection