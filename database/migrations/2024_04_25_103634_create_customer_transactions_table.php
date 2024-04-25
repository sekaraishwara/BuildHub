<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('customer_transactions', function (Blueprint $table) {
            $table->id();

            // $table->string('customer_id');
            // $table->string('store_id ');
            $table->foreignId('cart_id')->constrained('customer_carts');
            $table->string('invoice_no');
            $table->integer('total_price');
            $table->boolean('has_discount')->default(false);
            $table->boolean('discount_amount')->default(0);
            $table->text('shipping_address');
            $table->timestamp('transaction_date');
            $table->boolean('isActive')->default('1');
            $table->string('payment')->default('bank_transfer');
            $table->enum('payment_status', ['pending', 'paid', 'failed'])->default('pending');
            $table->timestamp('paid_at')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer_transactions');
    }
};
