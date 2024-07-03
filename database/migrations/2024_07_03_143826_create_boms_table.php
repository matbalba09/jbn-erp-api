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
        Schema::create('boms', function (Blueprint $table) {
            $table->id();
            $table->integer('product_id')->nullable();
            $table->integer('component_id')->nullable();
            $table->decimal('unit_cost', 10, 2)->nullable();
            $table->integer('quantity')->nullable();
            $table->string('uom')->nullable();
            $table->integer('bom_type_id')->nullable();
            $table->integer('is_deleted')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('boms');
    }
};
