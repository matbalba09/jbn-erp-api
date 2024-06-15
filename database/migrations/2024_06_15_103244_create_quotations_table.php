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
        Schema::create('quotations', function (Blueprint $table) {
            $table->id();
            $table->string('order_no')->nullable();
            $table->string('quotation_no')->nullable();
            $table->string('quotation_date')->nullable();
            $table->string('valid_until')->nullable();
            $table->decimal('total_price', 10, 2)->nullable();
            $table->integer('requested_by')->nullable();
            $table->integer('approved_by')->nullable();
            $table->string('received_by')->nullable();
            $table->string('remarks')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quotations');
    }
};
