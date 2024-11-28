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
        Schema::create('po_detail_print_material', function (Blueprint $table) {
            $table->id();
            $table->foreignId('po_detail_id')->constrained('po_details')->onDelete('cascade');
            $table->foreignId('print_material_id')->constrained('print_materials')->onDelete('cascade');
            $table->primary(['po_detail_id', 'print_material_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('po_detail_print_material');
    }
};
