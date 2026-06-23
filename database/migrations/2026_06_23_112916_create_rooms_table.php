<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();

            $table->foreignId('category_id')
                ->constrained('room_categories')
                ->cascadeOnDelete();

            $table->string('room_no')->unique();

            $table->integer('floor')->nullable();

            $table->enum('status', [
                'available',
                'maintenance',
                'inactive'
            ])->default('available');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('rooms');
    }
};