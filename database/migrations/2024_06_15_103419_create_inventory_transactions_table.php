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
        Schema::create('inventory_transactions', function (Blueprint $table) {
            $table->id();
            $table->integer('inventory_id')->nullable();
            $table->integer('quantity')->nullable();
            $table->string('image')->nullable();
            $table->string('flow')->nullable();
            $table->string('remarks')->nullable();
            $table->string('documents')->nullable();
            $table->integer('is_deleted')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventory_transactions');
    }
};
