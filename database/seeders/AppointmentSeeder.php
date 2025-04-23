<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Appointment;
use App\Models\Car;

class AppointmentSeeder extends Seeder
{
    public function run()
    {
        // Create appointments for different cars
        Appointment::create([
            'customer_name' => 'John Doe',
            'customer_email' => 'johndoe@example.com',
            'customer_phone' => '1234567890',
            'car_id' => Car::where('model_name', 'Cruiser')->first()->id,
            'appointment_date' => '2025-05-15',
            'down_payment_percentage' => 20,
            'promotion_eligible' => true,
            'purchase_status' => false,
        ]);

        Appointment::create([
            'customer_name' => 'Jane Smith',
            'customer_email' => 'janesmith@example.com',
            'customer_phone' => '0987654321',
            'car_id' => Car::where('model_name', 'Roadster')->first()->id,
            'appointment_date' => '2025-06-10',
            'down_payment_percentage' => 10,
            'promotion_eligible' => false,
            'purchase_status' => false,
        ]);

        Appointment::create([
            'customer_name' => 'Alice Johnson',
            'customer_email' => 'alicejohnson@example.com',
            'customer_phone' => '1122334455',
            'car_id' => Car::where('model_name', 'Vroom')->first()->id,
            'appointment_date' => '2025-07-01',
            'down_payment_percentage' => 25,
            'promotion_eligible' => true,
            'purchase_status' => true,
        ]);

        // 9 customers with down_payment_percentage >= 10 and promotion_eligible = true, purchase_status = true
        for ($i = 1; $i <= 9; $i++) {
            Appointment::create([
                'customer_name' => 'Customer ' . ($i + 3), // Unique customer names
                'customer_email' => 'customer' . ($i + 3) . '@example.com',
                'customer_phone' => '123456789' . ($i + 3),
                'car_id' => Car::where('model_name', 'Vroom')->first()->id,
                'appointment_date' => '2025-07-' . ($i + 1),  // Sequential dates
                'down_payment_percentage' => 10 + rand(1, 10), // Random down payment percentage >= 10
                'promotion_eligible' => true,
                'purchase_status' => true,
            ]);
        }

        // 3 customers with down_payment_percentage < 10 and promotion_eligible = false
        for ($i = 1; $i <= 3; $i++) {
            Appointment::create([
                'customer_name' => 'Customer ' . ($i + 12), // Unique customer names
                'customer_email' => 'customer' . ($i + 12) . '@example.com',
                'customer_phone' => '123456789' . ($i + 12),
                'car_id' => Car::where('model_name', 'Vroom')->first()->id,
                'appointment_date' => '2025-07-' . (10 + $i), // Sequential dates for remaining customers
                'down_payment_percentage' => rand(1, 9), // Random down payment percentage < 10
                'promotion_eligible' => false,
                'purchase_status' => true,
            ]);
        }
    }
}
