<?php

namespace App\Filament\Widgets;

use App\Models\BlogPost;
use App\Models\EventRegistration;
use App\Models\Partner;
use App\Models\Program;
use App\Models\Volunteer;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverviewWidget extends BaseWidget
{
    protected static ?string $pollingInterval = '60s';

    protected function getStats(): array
    {
        $activePrograms = Program::where('is_active', true)->count();
        $partnerCount = Partner::where('is_active', true)->count();
        $pendingVolunteers = Volunteer::where('status', 'pending')->count();
        $volunteerTotal = Volunteer::count();
        $recentRegistrations = EventRegistration::where('created_at', '>=', now()->subDays(7))->count();
        $registrationTotal = EventRegistration::count();
        $publishedPosts = BlogPost::where('status', 'published')->count();
        $totalPosts = BlogPost::count();

        return [
            Stat::make('Active Programs', $activePrograms)
                ->description($partnerCount . ' active partners')
                ->descriptionIcon('heroicon-o-rocket-launch')
                ->chart([3, 4, 5, 4, 6, 6, 7, 7, 8, 8, 9, 10])
                ->chartColor('rgba(255,255,255,0.6)')
                ->color('success')
                ->extraAttributes([
                    'class' => 'stats-card-gradient-1',
                ]),

            Stat::make('Pending Volunteers', $pendingVolunteers)
                ->description("$pendingVolunteers pending - $volunteerTotal total")
                ->descriptionIcon('heroicon-o-heart')
                ->chart([3, 5, 2, 4, 8, 6, 3, 7, 4, 9, 5, 2])
                ->chartColor('rgba(255,255,255,0.6)')
                ->color('warning')
                ->extraAttributes([
                    'class' => 'stats-card-gradient-2',
                ]),

            Stat::make('New Registrations (7d)', $recentRegistrations)
                ->description("$recentRegistrations this week - $registrationTotal total")
                ->descriptionIcon('heroicon-o-clipboard-document-list')
                ->chart([2, 4, 1, 6, 3, 8, 5, 7, 2, 4, 9, 6])
                ->chartColor('rgba(255,255,255,0.6)')
                ->color('info')
                ->extraAttributes([
                    'class' => 'stats-card-gradient-3',
                ]),

            Stat::make('Published Posts', "$publishedPosts / $totalPosts")
                ->description("$publishedPosts published - " . round(($totalPosts > 0 ? $publishedPosts / $totalPosts * 100 : 0)) . '% publish rate')
                ->descriptionIcon('heroicon-o-newspaper')
                ->chart([5, 8, 3, 10, 7, 12, 9, 15, 11, 14, 18, 20])
                ->chartColor('rgba(255,255,255,0.6)')
                ->color('primary')
                ->extraAttributes([
                    'class' => 'stats-card-gradient-4',
                ]),
        ];
    }
}
