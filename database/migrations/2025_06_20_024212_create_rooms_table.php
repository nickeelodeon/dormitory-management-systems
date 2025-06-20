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
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('room_num')->unique();
            $table->integer('capacity');
            $table->integer('current_occupants')->default(0);
            $table->enum('gender', ['Male', 'Female']);
            $table->integer('floor');
            $table->enum('status', ['Available', 'Occupied', 'Maintenance'])->default('Available');
            $table->string('notes')->nullable();
            $table->integer('rates');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rooms');
    }
};
