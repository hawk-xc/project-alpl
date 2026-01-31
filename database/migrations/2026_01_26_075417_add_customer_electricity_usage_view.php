<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if (DB::getDriverName() !== 'mysql') {
            return;
        }

        DB::unprepared('
        DROP VIEW IF EXISTS view_customer_electricity_usage;

            CREATE VIEW view_customer_electricity_usage AS
            SELECT
                c.id AS customer_id,
                c.name AS customer_name,
                cu.month,
                cu.year,
                (cu.end_meter - cu.start_meter) AS total_usage
            FROM customer_usages cu
            JOIN customers c ON cu.customer_id = c.id;
        ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::unprepared('DROP VIEW IF EXISTS view_customer_electricity_usage;');
    }
};
