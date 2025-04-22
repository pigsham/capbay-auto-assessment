<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{

    // View list of cars
    public function viewCars()
    {   
        // Check if the user is logged in
        if (!Auth::check()) {
            return redirect()->route('admin.login');  // Redirect to login if not authenticated
        }
        $cars = Car::all(); // Retrieve all cars
        return view('admin.cars.index', compact('cars'));
    }

    // View appointments for a specific car
    public function viewAppointments($carId)
    {
        $appointments = Appointment::where('car_model', $carId)->get();  // Get appointments for the car
        $car = Car::findOrFail($carId); // Get car details
        return view('admin.appointments.index', compact('appointments', 'car'));
    }

    // Edit car details
    public function editCar($carId)
    {
        $car = Car::findOrFail($carId);  // Get car details for editing
        return view('admin.cars.edit', compact('car'));
    }

    // Update car details
    public function updateCar(Request $request, $carId)
    {
        $car = Car::findOrFail($carId);  // Get the car to update

        // Validate the input
        $validated = $request->validate([
            'model_name' => 'required',
            'brand' => 'required',
            'price' => 'required|numeric',
            'description' => 'nullable',
            'available_units' => 'required|integer',
            'image_url' => 'nullable|string',
        ]);

        // Update the car details
        $car->update($validated);

        return redirect()->route('admin.cars.index')->with('status', 'Car updated successfully!');
    }

    // Delete a car
    public function deleteCar($carId)
    {
        $car = Car::findOrFail($carId);
        $car->delete();  // Delete the car

        return redirect()->route('admin.cars.index')->with('status', 'Car deleted successfully!');
    }
}
