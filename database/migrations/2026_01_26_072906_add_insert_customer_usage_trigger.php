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
                IF NEW.end_meter < NEW.start_meter THEN
                    SIGNAL SQLSTATE '45000'
                    SET MESSAGE_TEXT = 'Meter akhir tidak boleh lebih kecil dari meter awal';
                END IF;

                SET v_total_meter = NEW.end_meter - NEW.start_meter;

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
                    v_total_meter,
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
