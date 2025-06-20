<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('residents', function (Blueprint $table) {
            $table->unsignedBigInteger('room_id')->nullable()->after('payment_status');

            $table->foreign('room_id')
                  ->references('id')
                  ->on('rooms')
                  ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::table('residents', function (Blueprint $table) {
            $table->dropForeign(['room_id']);
            $table->dropColumn('room_id');
        });
    }
};