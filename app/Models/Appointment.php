<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_name',
        'customer_email',
        'customer_phone',
        'car_model',
        'appointment_date',
        'down_payment_percentage',
        'promotion_eligible',
        'purchase_status',
    ];

    public function car()
    {
        return $this->belongsTo(Car::class);
    }

    /**
     * Determine if this appointment is eligible for promotion.
     */
    public function isPromotionEligible()
    {
        // Get the related car model for the appointment
        $car = $this->car;
    
        // Check if the car is "CapBay Vroom" and down payment percentage is >= 10%
        if ($car->model_name === 'CapBay Vroom' && $this->down_payment_percentage >= 10) {
            // Get the count of eligible customers who have registered for the promotion
            $eligibleCustomersCount = Appointment::where('car_id', $this->car_id)
                ->where('promotion_eligible', true)
                ->where('purchase_status', true) // Only consider customers who have a purchase status as true
                ->count();
    
            // Check if there are fewer than 10 customers who are eligible for the promotion
            return $eligibleCustomersCount < 10;
        }
    
        // If any of the conditions fail, return false (not eligible)
        return false;
    }
}
