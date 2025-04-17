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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('brand_id')->constrained()->onDelete('cascade');
            $table->string('product_name');
            $table->string('logo')->nullable();
            $table->text('description')->nullable();
            $table->decimal('price', 10, 2);
            $table->integer('quantity')->default(0);
            $table->boolean('status')->default(1); // 1 = active, 0 = inactive

            $table->string('model');
            $table->string('processor');
            $table->string('graphics');
            $table->string('memory');
            $table->text('display');
            $table->string('storage');
            $table->text('io_ports');
            $table->string('os');
            $table->string('color');
            $table->string('warranty');
            $table->decimal('old_price', 10, 2)->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
