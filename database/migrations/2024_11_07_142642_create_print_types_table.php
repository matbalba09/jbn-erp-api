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
        Schema::create('print_types', function (Blueprint $table) {
            $table->id();
            $table->string('print')->nullable();
            $table->string('material')->nullable();
            $table->string('size')->nullable();
            $table->decimal('price', 10, 2)->nullable();
            $table->string('description')->nullable();
            $table->string('remarks')->nullable();
            $table->integer('is_deleted')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('print_types');
    }
};
