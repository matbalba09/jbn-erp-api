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
        Schema::create('purchase_requisition_slip_details', function (Blueprint $table) {
            $table->id();
            $table->string('purchase_requisition_slip_no')->nullable();
            $table->string('supplier')->nullable();
            $table->string('item')->nullable();
            $table->integer('quantity')->nullable();
            $table->string('remarks')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchase_requisition_slip_details');
    }
};
