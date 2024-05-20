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
        Schema::create('customer_service_orders', function (Blueprint $table) {
            $table->id();
            $table->string('invoice_no');
            $table->string('orderType');
            $table->string('service_name');
            $table->string('total_price');
            $table->string('client_email');
            $table->string(' serviceProvider_name');
            $table->string('serviceProvider_email');
            $table->string('serviceProvider_id');
            $table->string('isActive')->default(1);
            $table->string('isPayment')->default(0);
            $table->string('paid_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer_service_orders');
    }
};
