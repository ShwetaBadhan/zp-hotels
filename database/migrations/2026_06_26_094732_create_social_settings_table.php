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
        Schema::create('social_settings', function (Blueprint $table) {
            $table->id();
            $table->string('facebook_url');
            $table->string('instagram_url');
            $table->string('linkedin_url');
            $table->string('twitter_url');
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**z
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('social_settings');
    }
};
