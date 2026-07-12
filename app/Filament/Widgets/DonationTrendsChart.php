<?php

namespace App\Filament\Widgets;

use App\Models\Donation;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Carbon;

class DonationTrendsChart extends ChartWidget
{
    protected static ?string $heading = 'Donation Trends';
    protected static ?string $pollingInterval = '60s';

    public static function canView(): bool
    {
        return false;
    }

    protected function getData(): array
    {
        $data = collect(range(29, 0))->map(function ($daysAgo) {
            $date = now()->subDays($daysAgo);
            $total = Donation::successful()
                ->whereDate('created_at', $date->toDateString())
                ->sum('amount');
            return [
                'date' => $date->format('M d'),
                'total' => (float) $total,
            ];
        });

        return [
            'datasets' => [
                [
                    'label' => 'Donations (₦)',
                    'data' => $data->pluck('total')->toArray(),
                    'backgroundColor' => 'rgba(16, 185, 129, 0.2)',
                    'borderColor' => '#10B981',
                    'fill' => true,
                    'tension' => 0.4,
                ],
            ],
            'labels' => $data->pluck('date')->toArray(),
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }

    protected function getOptions(): array
    {
        return [
            'plugins' => [
                'legend' => [
                    'display' => false,
                ],
            ],
            'scales' => [
                'y' => [
                    'beginAtZero' => true,
                    'ticks' => [
                        'callback' => "function(value) { return '₦' + value.toLocaleString(); }",
                    ],
                ],
            ],
        ];
    }
}
