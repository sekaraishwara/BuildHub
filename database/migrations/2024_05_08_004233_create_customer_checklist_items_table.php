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
        Schema::create('customer_checklist_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_checklist_id')->constrained('customer_checklists')->onDelete('cascade');
            $table->string('list')->nullable();
            $table->text('notes')->nullable();
            $table->boolean('isComplete')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer_checklist_items');
    }
};
