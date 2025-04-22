<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->string('customer_name');
            $table->string('customer_email')->nullable();
            $table->string('customer_phone');
            $table->foreignId('car_id')->constrained('cars')->onDelete('cascade');  // Added foreign key to reference the cars table
            $table->date('appointment_date');
            $table->decimal('down_payment_percentage', 5, 2)->default(0); // E.g., 20% down payment
            $table->boolean('promotion_eligible')->default(false); // Whether eligible for promotion
            $table->boolean('purchase_status')->default(false); // Whether the customer has decided to purchase
            $table->timestamps(); // created_at and updated_at columns
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};