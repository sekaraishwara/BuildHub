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
        Schema::create('transaction_proofs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('transaction_id')->constrained('customer_transactions')->onDelete('cascade');
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
        Schema::dropIfExists('transaction_proofs');
    }
};
