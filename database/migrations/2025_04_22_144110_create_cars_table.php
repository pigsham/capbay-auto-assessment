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
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->string('model_name');
            $table->string('brand');
            $table->decimal('price', 10, 2);
            $table->text('description')->nullable();
            $table->integer('available_units')->default(0); // Number of available units for test drives
            $table->string('image_url')->nullable(); // URL of the car's image
            $table->timestamps(); // created_at and updated_at columns
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};