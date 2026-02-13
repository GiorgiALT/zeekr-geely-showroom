<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->string('brand'); // Zeekr or Geely
            $table->string('model');
            $table->year('year');
            $table->decimal('price', 10, 2);
            $table->string('color');
            $table->integer('mileage')->default(0);
            $table->enum('fuel_type', ['Electric', 'Hybrid', 'Petrol', 'Diesel']);
            $table->enum('transmission', ['Automatic', 'Manual']);
            $table->text('description');
            $table->string('main_image');
            $table->json('gallery_images')->nullable();
            $table->enum('status', ['available', 'sold', 'reserved'])->default('available');
            $table->boolean('is_featured')->default(false);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};