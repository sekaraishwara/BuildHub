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
        Schema::create('customer_carts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id')->constrained('customers')->onDelete('cascade'); // krena customers itu untuk detail identitas as a Customer
            $table->foreignId('product_id')->constrained('store_products')->onDelete('cascade');

            $table->string('store_name');
            $table->string('item_qty')->default(0); // per product
            $table->string('item_name');
            $table->integer('item_price');
            $table->string('item_image');
            $table->date('date');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer_carts');
    }
};
