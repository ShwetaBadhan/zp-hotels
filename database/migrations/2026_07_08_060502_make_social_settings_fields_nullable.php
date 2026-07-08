<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('social_settings', function (Blueprint $table) {
            $table->string('facebook_url')->nullable()->change();
            $table->string('instagram_url')->nullable()->change();
            $table->string('linkedin_url')->nullable()->change();
            $table->string('twitter_url')->nullable()->change();
        });
    }

    public function down(): void
    {
        Schema::table('social_settings', function (Blueprint $table) {
            $table->string('facebook_url')->nullable(false)->change();
            $table->string('instagram_url')->nullable(false)->change();
            $table->string('linkedin_url')->nullable(false)->change();
            $table->string('twitter_url')->nullable(false)->change();
        });
    }
};
