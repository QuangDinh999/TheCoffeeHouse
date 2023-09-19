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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->date('invoice_date');
            $table->integer('invoice_status');
            $table->integer('invoice_type');
            $table->string('invoice_note');
            $table->string('customer_name');
            $table->string('address');
            $table->string('phone');
            $table->foreignId('customer_id')->constrained('customers');
            $table->foreignId('admin_id')->constrained('admins');
            $table->foreignId('payment_id')->constrained('payments');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
