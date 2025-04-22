<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    // Define the columns that are mass assignable
    protected $fillable = [
        'model_name',
        'brand',
        'price',
        'description',
        'available_units',
        'image_url',
    ];

    // Define any relationships if necessary (e.g., if you have a category or manufacturer table)
}
