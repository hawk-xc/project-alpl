<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::unprepared("
            DROP FUNCTION IF EXISTS fn_sum_customer_usage_meter_total;

            CREATE FUNCTION fn_sum_customer_usage_meter_total(
                p_customer_id BIGINT
            )
            RETURNS INT
            DETERMINISTIC
            BEGIN
                DECLARE total INT;

                SELECT SUM(end_meter - start_meter)
                INTO total
                FROM customer_usages
                WHERE customer_id = p_customer_id;

                RETURN IFNULL(total, 0);
            END;
        ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::unprepared("DROP FUNCTION IF EXISTS fn_sum_customer_usage_meter_total;");
    }
};
