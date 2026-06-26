<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->string('booking_no')->unique();
            $table->string('city')->nullable();
            $table->foreignId('room_id')
                ->constrained('rooms')
                ->cascadeOnDelete();

            $table->foreignId('category_id')
                ->constrained('room_categories')
                ->cascadeOnDelete();

            // Customer Details
            $table->string('name');
            $table->string('email');
            $table->string('phone', 20);

            // Booking Details
            $table->date('check_in');
            $table->date('check_out');

            $table->integer('adults')->default(1);
            $table->integer('children')->default(0);

            $table->decimal('price', 10, 2)->nullable();
            $table->decimal('total_amount', 10, 2)->nullable();

            $table->text('special_request')->nullable();

            $table->enum('status', [
                'pending',
                'confirmed',
                'checked_in',
                'checked_out',
                'cancelled'
            ])->default('pending');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
