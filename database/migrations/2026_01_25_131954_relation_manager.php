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
            $table->foreign('tariff_id')->references('id')->on('customer_tariffs')->onDelete('cascade');
        });

        Schema::table('customer_usages', function (Blueprint $table) {
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
        });

        Schema::table('customer_payments', function (Blueprint $table) {
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
            $table->foreign('customer_bill_id')->references('id')->on('customer_bills')->onDelete('cascade');
        });

        Schema::table('customer_bills', function (Blueprint $table) {
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
            $table->foreign('customer_usage_id')->references('id')->on('customer_usages')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('customers', function (Blueprint $table) {
            $table->dropForeign(['tariff_id']);
        });

        Schema::table('customer_usages', function (Blueprint $table) {
            $table->dropForeign(['customer_id']);
        });

        Schema::table('customer_payments', function (Blueprint $table) {
            $table->dropForeign(['customer_id']);
            $table->dropForeign(['customer_bill_id']);
        });

        Schema::table('customer_bills', function (Blueprint $table) {
            $table->dropForeign(['customer_id']);
            $table->dropForeign(['customer_usage_id']);
        });
    }
};
