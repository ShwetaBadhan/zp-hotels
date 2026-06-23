<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('room_categories', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->string('slug')->unique();

            $table->decimal('price', 10, 2);
            $table->decimal('offer_price', 10, 2)->nullable();

            $table->integer('max_guests');

            $table->integer('bedrooms')->default(1);
            $table->integer('bathrooms')->default(1);

            $table->integer('size_sqft')->nullable();

            $table->longText('description')->nullable();

            $table->string('thumbnail')->nullable();

            $table->json('images')->nullable();

            $table->json('amenities')->nullable();

            $table->enum('status', [
                'active',
                'inactive'
            ])->default('active');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('room_categories');
    }
};