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
        Schema::create('production_details', function (Blueprint $table) {
            $table->id();
            // $table->integer('production_id')->nullable();
            // $table->string('status')->nullable();
            // $table->string('maker')->nullable();
            // $table->string('material')->nullable();
            // $table->string('color')->nullable();
            // $table->string('size')->nullable();
            // $table->string('print')->nullable();
            // $table->integer('quantity')->nullable();
            // $table->string('logo_size')->nullable();
            // $table->string('design')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('production_details');
    }
};
