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
        Schema::create('customer_checkout_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('checkout_id')->constrcained('customer_checkouts')->onDelete('cascade');
            $table->foreignId('product_id')->constrcained('store_products')->onDelete('cascade');
            $table->string('store_name');
            $table->string('item_name');
            $table->string('item_qty');
            $table->string('item_price');
            $table->string('item_image');
            $table->string('date');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer_checkot_items');
    }
};
