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
        Schema::table('customers', function (Blueprint $table) {
            $table->index('tariff_id');
        });

        Schema::table('customer_usages', function (Blueprint $table) {
            $table->index('customer_id');
        });

        Schema::table('customer_payments', function (Blueprint $table) {
            $table->index('customer_id');
            $table->index('customer_bill_id');
        });

        Schema::table('customer_bills', function (Blueprint $table) {
            $table->index('customer_id');
            $table->index('customer_usage_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // composite index
    }
};
