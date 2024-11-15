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
        Schema::create('item_requisition_supplier_v2', function (Blueprint $table) {
            $table->id();
            $table->foreignId('item_requisition_id')->constrained('item_requisitions')->onDelete('cascade');
            $table->foreignId('supplier_v2_id')->constrained('suppliers_v2')->onDelete('cascade');
            $table->primary(['item_requisition_id', 'supplier_v2_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('item_requisition_supplier_v2');
    }
};
