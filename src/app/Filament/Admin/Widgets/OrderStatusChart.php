<?php

namespace App\Filament\Admin\Widgets;

use App\Models\Order;
use Filament\Widgets\ChartWidget;

class OrderStatusChart extends ChartWidget
{
    protected static ?string $heading = 'Statistik Order';

    protected static ?int $sort = 1;

    protected function getData(): array
    {
        $statuses = ['pending', 'diproses', 'selesai'];

        $data = [
            'labels' => ['Pending', 'Diproses', 'Selesai'],
            'datasets' => [
                [
                    'label' => 'Jumlah Order',
                    'data' => [
                        Order::where('status', 'pending')->count(),
                        Order::where('status', 'diproses')->count(),
                        Order::where('status', 'selesai')->count(),
                    ],
                    'backgroundColor' => ['#facc15', '#3b82f6', '#22c55e'],
                ],
            ],
        ];

        return $data;
    }

    protected function getType(): string
    {
        return 'bar'; // Bisa diganti ke 'pie', 'line', 'doughnut', dll
    }
}

