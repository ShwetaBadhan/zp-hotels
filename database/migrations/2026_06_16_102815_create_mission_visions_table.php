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
        Schema::create('mission_visions', function (Blueprint $table) {
            $table->id();
            $table->text('sub_title');
            $table->text('main_title');
            $table->text('mission_main_title');
            $table->text('mission_sub_title');
            $table->text('vision_main_title');
            $table->text('vision_sub_title');
            $table->longText('mission');
            $table->longText('vision');
            $table->string('mission_image')->nullable();
            $table->string('vision_image')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mission_visions');
    }
};
