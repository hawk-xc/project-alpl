<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use App\Models\CustomerBill;
use Illuminate\Support\Facades\DB;

class CustomerBillMeterChart extends ChartWidget
{
    protected ?string $heading = 'Total Meter per Bulan';

    protected int | string | array $columnSpan = 'full';

    protected function getData(): array
    {
        $rows = CustomerBill::query()
            ->select(
                DB::raw('LOWER(month) as month'),
                DB::raw('SUM(total_meter) as total')
            )
            ->groupBy('month')
            ->get()
            ->pluck('total', 'month');

        $monthMap = [
            'january' => 'Januari',
            'february' => 'Februari',
            'march' => 'Maret',
            'april' => 'April',
            'may' => 'Mei',
            'june' => 'Juni',
            'july' => 'Juli',
            'august' => 'Agustus',
            'september' => 'September',
            'october' => 'Oktober',
            'november' => 'November',
            'december' => 'Desember',
        ];

        return [
            'labels' => array_values($monthMap),
            'datasets' => [
                [
                    'label' => 'Total Meter',
                    'data' => array_map(
                        fn($key) => $rows[$key] ?? 0,
                        array_keys($monthMap)
                    ),
                ],
            ],
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
