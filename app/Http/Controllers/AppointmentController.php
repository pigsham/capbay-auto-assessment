<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\Car;

class AppointmentController extends Controller
{
        /**
     * Show the form for creating a new appointment.
     *
     * @param  int  $carId
     * @return \Illuminate\Http\Response
     */
    public function create($carId)
    {
        // Fetch the car details to display in the form
        $car = Car::findOrFail($carId);

        // Return view with the car data for creating an appointment
        return view('admin.appointments.create', compact('car'));
    }

    /**
     * Store a newly created appointment in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $carId
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $carId)
    {
        // First, fetch the car so we can get its price
        $car = Car::findOrFail($carId);
    
        // Validate the incoming form
        $validated = $request->validate([
            'customer_name'        => 'required|string|max:255',
            'customer_email'       => 'nullable|email',
            'customer_phone'       => 'required|string|max:20',
            'appointment_date'     => 'required|date',
            'down_payment_amount'  => 'required|numeric|min:0',   // NEW
            'promotion_eligible'   => 'nullable|boolean',
            'purchase_status'      => 'nullable|boolean',
        ]);
    
        // Calculate percentage from the raw amount
        $amount     = $validated['down_payment_amount'];
        $percentage = $car->price > 0
            ? round(($amount / $car->price) * 100, 2)
            : 0;
    
        // Create the appointment
        $appointment = Appointment::create([
            'customer_name'           => $validated['customer_name'],
            'customer_email'          => $validated['customer_email'],
            'customer_phone'          => $validated['customer_phone'],
            'appointment_date'        => $validated['appointment_date'],
            'down_payment_percentage' => $percentage,                     // store the calculated %
            'car_id'                  => $carId,
            'promotion_eligible'      => $validated['promotion_eligible'] ?? false,
            'purchase_status'         => $validated['purchase_status']  ?? false,
        ]);
    
        // Re-check promotion eligibility after creation
        if ($appointment->isPromotionEligible()) {
            $appointment->update(['promotion_eligible' => true]);
        }
    
        return redirect()
            ->route('cars.website_index')
            ->with('status', 'Appointment created successfully!');
    }
    
    /**
     * Display a listing of appointments for a specific car.
     */
    public function index($carId)
    {
        // Fetch the car details
        $car = Car::findOrFail($carId);

        // Fetch appointments for the specific car
        $appointments = Appointment::where('car_id', $carId)->get();

        // Return view with car and its appointments
        return view('admin.appointments.index', compact('car', 'appointments'));
    }

    /**
     * Show the form for editing the specified appointment.
     */
    public function edit($carId, $appointmentId)
    {
        // Fetch the car and the specific appointment
        $car = Car::findOrFail($carId);
        $appointment = Appointment::findOrFail($appointmentId);

        // Return view with car and appointment data
        return view('admin.appointments.edit', compact('car', 'appointment'));
    }

    /**
     * Update the specified appointment in the database.
     */
    public function update(Request $request, $carId, $appointmentId)
    {
        // Fetch the appointment
        $appointment = Appointment::findOrFail($appointmentId);

        // Validate the input
        $validated = $request->validate([
            'customer_name' => 'required|string|max:255',
            'customer_email' => 'nullable|email',
            'customer_phone' => 'required|string|max:20',
            'appointment_date' => 'required|date',
            'down_payment_percentage' => 'nullable|numeric|min:0|max:100',
            'promotion_eligible' => 'nullable|boolean',
            'purchase_status' => 'nullable|boolean',
        ]);

        // Update the appointment
        $appointment->update($validated);

        // Determine if the appointment is eligible for promotion after updating the data
        if ($appointment->isPromotionEligible()) {
            // Mark as eligible
            $appointment->update(['promotion_eligible' => true]);
        }

        // Redirect back to appointments index page for the car
        return redirect()->route('admin.appointments.index', $carId)
                         ->with('status', 'Appointment updated successfully!');
    }

    /**
     * Remove the specified appointment from storage.
     */
    public function destroy($carId, $appointmentId)
    {
        // Find and delete the appointment
        $appointment = Appointment::findOrFail($appointmentId);
        $appointment->delete();

        // Redirect back to the appointments list for the car
        return redirect()->route('admin.appointments.index', $carId)
                         ->with('status', 'Appointment deleted successfully!');
    }

        /**
     * Quickly test whether this appointment is promotion-eligible.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\JsonResponse
     */
    public function checkPromotion(Appointment $appointment)
    {
        $eligible = $appointment->isPromotionEligible();

        return response()->json([
            'appointment_id' => $appointment->id,
            'car_model'      => $appointment->car->model_name,
            'down_payment'   => $appointment->down_payment_percentage,
            'promotion_eligible' => $eligible,
        ]);
    }

    public function eligibleCustomerCount($carId)
    {
        $count = Appointment::where('car_id', $carId)
            ->where('promotion_eligible', true)
            ->where('purchase_status', true)
            ->count();

        return response()->json([
            'car_id' => (int)$carId,
            'eligible_customers' => $count,
        ]);
    }
}