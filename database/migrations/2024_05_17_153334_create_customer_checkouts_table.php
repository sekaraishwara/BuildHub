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
        Schema::create('customer_checkouts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrcained('users')->onDelete('cascade');
            $table->foreignId('store_id')->constrcained('stores')->onDelete('cascade');
            $table->integer('cart_id');
            $table->boolean('hasCheckout')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer_checkouts');
    }
};
