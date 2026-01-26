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
            DROP TRIGGER IF EXISTS after_insert_customer_usage;

            CREATE TRIGGER after_insert_customer_usage
            AFTER INSERT ON customer_usages
            FOR EACH ROW
            BEGIN
                DECLARE v_price_per_kwh INT;
                DECLARE v_total_meter INT;
                DECLARE v_bill_code VARCHAR(20);

                -- hitung pemakaian
                SET v_total_meter = NEW.end_meter - NEW.start_meter;

                -- ambil tarif per kwh
                SELECT ct.price_in_kwh
                INTO v_price_per_kwh
                FROM customers c
                JOIN customer_tariffs ct ON ct.id = c.tariff_id
                WHERE c.id = NEW.customer_id
                LIMIT 1;

                -- generate bill id
                SET v_bill_code = CONCAT(
                    'EL-',
                    UPPER(SUBSTRING(REPLACE(UUID(), '-', ''), 1, 10))
                );

                -- insert tagihan
                INSERT INTO customer_bills (
                    bill_id,
                    customer_id,
                    customer_usage_id,
                    month,
                    year,
                    total_meter,
                    status,
                    created_at,
                    updated_at
                ) VALUES (
                    v_bill_code,
                    NEW.customer_id,
                    NEW.id,
                    NEW.month,
                    NEW.year,
                    v_total_meter * v_price_per_kwh,
                    'pending',
                    NOW(),
                    NOW()
                );
            END;
        ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::unprepared("
            DROP TRIGGER IF EXISTS after_insert_customer_usage;
        ");
    }
};
