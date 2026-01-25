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
        Schema::create('customer_payments', function (Blueprint $table) {
            $table->id();
            $table->string('transaction_id')->unique()->nullable(false);
            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('customer_bill_id');
            $table->dateTime('payment_at');
            $table->string('month_paid')->nullable(false);
            $table->decimal('admin_fee', 10, 2)->nullable(false);
            $table->decimal('total_amount', 10, 2)->nullable(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer_payments');
    }
};
