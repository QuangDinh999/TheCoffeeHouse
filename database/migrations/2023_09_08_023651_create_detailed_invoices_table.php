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
        Schema::create('detailed_invoices', function (Blueprint $table) {
            $table->id();
            $table->foreignId('drinksize_id')->constrained('drink_sizes');
            $table->foreignId('invoice_id')->constrained('invoices');
            $table->integer('quantity');
            $table->integer('price');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detailed_invoices');
    }
};
