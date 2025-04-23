<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CarController extends Controller
{


    // Show available cars for customers
    public function availableCars()
    {
        // Fetch all available cars
        $cars = Car::where('available_units', '>', 0)->get(); // Fetch cars with available units

        return view('website.cars.website_index', compact('cars'));  // Pass the cars to the view
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Check if the user is logged in
        if (!Auth::check()) {
            return redirect()->route('admin.login');  // Redirect to login if not authenticated
        }
        $cars = Car::all();  // Fetch all cars from the database
        return view('admin.cars.index', compact('cars'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Check if the user is logged in
        if (!Auth::check()) {
            return redirect()->route('admin.login');  // Redirect to login if not authenticated
        }
        return view('admin.cars.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Check if the user is logged in
        if (!Auth::check()) {
            return redirect()->route('admin.login');  // Redirect to login if not authenticated
        }
        // Validate the form data
        $validated = $request->validate([
            'model_name' => 'required|string|max:255',
            'brand' => 'required|string|max:255',
            'price' => 'required|numeric',
            'available_units' => 'required|integer',
            'description' => 'nullable|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Handle the file upload for the car image
        $imagePath = $request->file('image')->store('public/cars');

        // Create a new car record
        Car::create([
            'model_name' => $request->model_name,
            'brand' => $request->brand,
            'price' => $request->price,
            'available_units' => $request->available_units,
            'description' => $request->description,
            'image_url' => basename($imagePath), // Save only the file name
        ]);

        return redirect()->route('admin.cars.index')->with('status', 'Car added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Check if the user is logged in
        if (!Auth::check()) {
            return redirect()->route('admin.login');  // Redirect to login if not authenticated
        }
        $car = Car::findOrFail($id);  // Find the car by ID
        return view('admin.cars.show', compact('car'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Check if the user is logged in
        if (!Auth::check()) {
            return redirect()->route('admin.login');  // Redirect to login if not authenticated
        }
        $car = Car::findOrFail($id);  // Find the car by ID
        return view('admin.cars.edit', compact('car'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Check if the user is logged in
        if (!Auth::check()) {
            return redirect()->route('admin.login');  // Redirect to login if not authenticated
        }
        $car = Car::findOrFail($id);

        $validated = $request->validate([
            'model_name' => 'required|string|max:255',
            'brand' => 'required|string|max:255',
            'price' => 'required|numeric',
            'available_units' => 'required|integer',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // If an image was uploaded, handle the upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('public/cars');
            $validated['image_url'] = basename($imagePath); // Update the image URL
        }

        // Update the car record with validated data
        $car->update($validated);

        return redirect()->route('admin.cars.index')->with('status', 'Car updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Check if the user is logged in
        if (!Auth::check()) {
            return redirect()->route('admin.login');  // Redirect to login if not authenticated
        }
        $car = Car::findOrFail($id);  // Find the car by ID
        $car->delete();  // Delete the car from the database

        return redirect()->route('admin.cars.index')->with('status', 'Car deleted successfully!');
    }
}