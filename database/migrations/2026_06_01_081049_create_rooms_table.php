<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    // public function up(): void
    // {
    //     Schema::create('rooms', function (Blueprint $table) {
    //         $table->id();
    //         $table->string('name');
    //         $table->string('slug')->unique();
    //         $table->foreignId('category_id')->constrained('room_categories')->onDelete('cascade');
    //         $table->text('description')->nullable();
    //         $table->text('short_description')->nullable();
    //         $table->decimal('price', 10, 2);
    //         $table->decimal('offer_price', 10, 2)->nullable();
    //         $table->integer('max_guests')->default(2);
    //         $table->integer('bedrooms')->default(1);
    //         $table->integer('bathrooms')->default(1);
    //         $table->integer('size_sqft')->nullable();
    //         $table->string('thumbnail')->nullable();
    //         $table->json('images')->nullable(); // Store multiple image paths
    //         $table->json('amenities')->nullable(); // Store amenities as array
    //         $table->enum('status', ['active', 'inactive'])->default('active');
    //         $table->enum('featured', ['yes', 'no'])->default('no');
    //         $table->integer('sort_order')->default(0);
    //         $table->timestamps();
    //     });
    // }

    // public function down(): void
    // {
    //     Schema::dropIfExists('rooms');
    // }
};
