<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Car;
use Illuminate\Database\Seeder;

class CarSeeder extends Seeder
{
    public function run()
    {
        // Add cars to the database
        Car::create([
            'model_name' => 'Cruiser',
            'brand' => 'CapBay',
            'price' => 50000.00,
            'description' => 'A cruiser model for long drives.',
            'available_units' => 10,
            'image_url' => '/storage/cars/cruiser.jpg',  // Path to the image
        ]);

        Car::create([
            'model_name' => 'Roadster',
            'brand' => 'CapBay',
            'price' => 60000.00,
            'description' => 'A roadster for adventure lovers.',
            'available_units' => 7,
            'image_url' => '/storage/cars/roadster.jpg',
        ]);

        Car::create([
            'model_name' => 'Vroom',
            'brand' => 'CapBay',
            'price' => 70000.00,
            'description' => 'High-performance model with AI technology.',
            'available_units' => 3,
            'image_url' => '/storage/cars/vroom.jpg',
        ]);
    }
}
