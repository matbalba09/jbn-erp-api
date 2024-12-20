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
        Schema::create('po_payments', function (Blueprint $table) {
            $table->id();
            $table->string('po_no')->nullable();
            $table->string('issued_date')->nullable();
            $table->string('ref_no')->nullable();
            $table->string('paid_date')->nullable();
            $table->string('payment_method')->nullable();
            $table->decimal('amount', 10, 2)->nullable();
            $table->string('description')->nullable();
            $table->string('documents')->nullable();
            $table->string('status')->nullable();
            $table->string('check_no')->nullable();
            $table->string('bank_name')->nullable();
            $table->integer('verified')->nullable();
            $table->integer('is_deleted')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('po_payments');
    }
};
