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
        Schema::create('store_products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('store_id')->constrained('stores');
            $table->string('image')->nullable();
            $table->string('name');
            $table->string('slug')->nullable();
            $table->string('category');
            $table->int('stock');
            $table->int('discount_price');
            $table->longText('desc');
            $table->int('price');
            $table->string('ratings')->default('0');
            $table->string('review')->default('0');
            $table->boolean('status')->default('1');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('store_products');
    }
};
