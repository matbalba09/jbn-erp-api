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
        Schema::create('prs', function (Blueprint $table) {
            $table->id();
            $table->string('prs_no')->nullable();
            $table->string('prs_date')->nullable();
            $table->integer('customer_id')->nullable();
            $table->integer('requested_by')->nullable();
            $table->integer('approved_by')->nullable();
            $table->string('remarks')->nullable();
            $table->string('status')->nullable();
            $table->integer('is_deleted')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prs');
    }
};
