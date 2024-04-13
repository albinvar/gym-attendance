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
        Schema::table('users', function (Blueprint $table) {
            // enable / disable pin for transaction
            $table->boolean('enable_pin')->default(false);
            // add column to store 4 digit pin for transaction
            $table->string('pin')->nullable();
            // add column to store rfid tag id
            $table->string('card')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('enable_pin');
            $table->dropColumn('pin');
            $table->dropColumn('card');
        });
    }
};
