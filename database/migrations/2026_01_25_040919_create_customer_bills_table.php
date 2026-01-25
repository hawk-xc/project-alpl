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
        Schema::create('customer_bills', function (Blueprint $table) {
            $table->id();
            $table->string('bill_id')->unique()->nullable(false);
            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('customer_usage_id');
            $table->string('month')->nullable(false);
            $table->integer('year')->nullable(false);
            $table->integer('total_meter')->nullable(false);
            $table->enum('status', ['pending', 'paid', 'overdue'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer_bills');
    }
};
