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
            DROP FUNCTION IF EXISTS fn_sum_monthly_usage;

            CREATE FUNCTION fn_sum_monthly_usage(
                p_customer_id BIGINT,
                p_month VARCHAR(20),
                p_year INT
            )
            RETURNS INT
            DETERMINISTIC
            BEGIN
                DECLARE total INT;

                SELECT SUM(end_meter - start_meter)
                INTO total
                FROM customer_usages
                WHERE customer_id = p_customer_id
                AND month COLLATE utf8mb4_unicode_ci = p_month COLLATE utf8mb4_unicode_ci
                AND year = p_year;

                RETURN IFNULL(total, 0);
            END;
        ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::unprepared('
            DROP FUNCTION IF EXISTS fn_sum_monthly_usage
        ');
    }
};
