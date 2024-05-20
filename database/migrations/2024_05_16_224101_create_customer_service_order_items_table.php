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
        Schema::create('customer_service_order_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_service_order_id')->constrcained('customer_service_orders')->onDelete('cascade');
            $table->string('itemName')->nullable();
            $table->integer('itemPrice')->nullable();
            $table->integer('itmQty')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer_service_order_items');
    }
};
