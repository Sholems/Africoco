<?php

namespace App\Filament\Widgets;

use App\Models\BlogPost;
use Filament\Widgets\ChartWidget;

class BlogPostOverview extends ChartWidget
{
    protected static ?string $heading = 'Blog Posts Status';
    protected static ?string $pollingInterval = '60s';

    protected function getData(): array
    {
        $draftCount = BlogPost::where('status', 'draft')->count();
        $publishedCount = BlogPost::where('status', 'published')->count();

        return [
            'datasets' => [
                [
                    'data' => [$publishedCount, $draftCount],
                    'backgroundColor' => ['#10B981', '#F59E0B'],
                    'hoverBackgroundColor' => ['#059669', '#D97706'],
                    'borderWidth' => 0,
                ],
            ],
            'labels' => ['Published (' . $publishedCount . ')', 'Draft (' . $draftCount . ')'],
        ];
    }

    protected function getType(): string
    {
        return 'doughnut';
    }

    protected function getOptions(): array
    {
        return [
            'plugins' => [
                'legend' => [
                    'position' => 'bottom',
                    'labels' => [
                        'padding' => 20,
                        'usePointStyle' => true,
                    ],
                ],
            ],
            'cutout' => '60%',
        ];
    }
}
