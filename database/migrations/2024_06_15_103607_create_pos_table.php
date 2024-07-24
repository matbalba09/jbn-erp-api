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
        Schema::create('pos', function (Blueprint $table) {
            $table->id();
            $table->string('po_no')->nullable();
            $table->integer('supplier_id')->nullable();
            $table->string('order_no')->nullable();
            $table->string('po_date')->nullable();
            $table->string('status')->nullable();
            $table->string('remarks')->nullable();
            $table->string('ship_to')->nullable();
            $table->string('delivery_date')->nullable();
            $table->string('payment_terms')->nullable();
            $table->integer('requested_by')->nullable();
            $table->integer('approved_by')->nullable();
            $table->string('received_by')->nullable();
            $table->integer('is_deleted')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pos');
    }
};
