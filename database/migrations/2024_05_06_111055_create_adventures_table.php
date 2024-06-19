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
        Schema::create('adventures', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description')->limit(1000);
            $table->string('location');
            $table->dateTime('date');
            $table->integer('duration');
            $table->integer('capacity');
            $table->string('image_url')->nullable();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('adventure_user', function (Blueprint $table) {
            $table->foreignId('adventure_id')->constrained()->onDelete('cascade');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->primary(['adventure_id', 'user_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('adventure_user');
        Schema::dropIfExists('adventures');
    }
};
