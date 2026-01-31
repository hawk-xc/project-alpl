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
        ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::unprepared('DROP FUNCTION IF EXISTS fn_sum_customer_usage_meter_total;');
    }
};
