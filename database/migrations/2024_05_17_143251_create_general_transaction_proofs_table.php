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
        Schema::create('general_transaction_proofs', function (Blueprint $table) {
            $table->id();
            $table->string('invoice_no')->nullable();
            $table->string('payment_proof')->nullable();
            $table->string('shipping_proof')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('generan_transaction_proofs');
    }
};
