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
        Schema::create('user_payments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('euser_id');
            $table->string('card_number'); // encrypted
            $table->string('expiry_date'); // encrypted
            $table->string('cvv');         // encrypted
            $table->timestamps();
        
            $table->foreign('euser_id')->references('id')->on('e_users')->onDelete('cascade');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_payments');
    }
};
