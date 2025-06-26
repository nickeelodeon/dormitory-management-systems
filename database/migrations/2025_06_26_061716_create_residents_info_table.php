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
        Schema::create('residents', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->text('email');
            $table->string('password');
            $table->enum('gender', ['Male', 'Female']);
            $table->string('number');
            $table->integer('age');
            $table->enum('status', ['Active', 'Non-Active'])->default('Non-Active');
            $table->enum('payment_status', ['Paid', 'Not Paid'])->default('Paid');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('room_id')->nullable();
            $table->foreign('room_id')->references('id')->on('rooms')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {   
        Schema::dropIfExists('residents');
    }
};
