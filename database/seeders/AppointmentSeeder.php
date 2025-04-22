<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Appointment;
use App\Models\Car;  // Import the Car model

class AppointmentSeeder extends Seeder
{
    public function run()
    {
        // Create appointments for different cars
        Appointment::create([
            'customer_name' => 'John Doe',
            'customer_email' => 'johndoe@example.com',
            'customer_phone' => '1234567890',
            'car_id' => Car::where('model_name', 'Cruiser')->first()->id,  // Link to Cruiser car
            'appointment_date' => '2025-05-15',
            'down_payment_percentage' => 20,
            'promotion_eligible' => true,
            'purchase_status' => false,
        ]);

        Appointment::create([
            'customer_name' => 'Jane Smith',
            'customer_email' => 'janesmith@example.com',
            'customer_phone' => '0987654321',
            'car_id' => Car::where('model_name', 'Roadster')->first()->id,  // Link to Roadster car
            'appointment_date' => '2025-06-10',
            'down_payment_percentage' => 10,
            'promotion_eligible' => false,
            'purchase_status' => false,
        ]);

        Appointment::create([
            'customer_name' => 'Alice Johnson',
            'customer_email' => 'alicejohnson@example.com',
            'customer_phone' => '1122334455',
            'car_id' => Car::where('model_name', 'Vroom')->first()->id,  // Link to Vroom car
            'appointment_date' => '2025-07-01',
            'down_payment_percentage' => 25,
            'promotion_eligible' => true,
            'purchase_status' => true,
        ]);
    }
}
