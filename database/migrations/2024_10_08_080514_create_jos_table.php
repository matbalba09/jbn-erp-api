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
        Schema::create('jos', function (Blueprint $table) {
            $table->id();
            $table->integer('jo_no')->nullable();
            $table->integer('po_no')->nullable();
            $table->integer('so_no')->nullable();
            $table->string('shipment_date')->nullable();
            $table->string('business_operation')->nullable();
            $table->string('oic')->nullable();
            $table->string('status')->nullable();
            $table->string('production_date')->nullable();
            $table->integer('is_deleted')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jos');
    }
};
