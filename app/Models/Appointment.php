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

    // Check promotion eligibility
    public function checkPromotionEligibility()
    {
        // Assuming promotion is only for CapBay Vroom model and minimum down payment is 10%
        if ($this->car_model == 'CapBay Vroom' && $this->down_payment_percentage >= 10) {
            $this->promotion_eligible = true;
            $this->save();  // Save the updated value to the database
        } else {
            $this->promotion_eligible = false;
            $this->save();  // Save the updated value to the database
        }
    }
}
