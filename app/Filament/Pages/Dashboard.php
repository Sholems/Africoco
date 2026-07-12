<?php

namespace App\Filament\Pages;

use App\Models\BlogPost;
use App\Models\Event;
use App\Models\EventRegistration;
use App\Models\Volunteer;
use Filament\Actions\Action;
use Filament\Actions\ActionGroup;
use Filament\Forms\Components\DatePicker;
use Filament\Notifications\Notification;
use Filament\Pages\Dashboard as BaseDashboard;

class Dashboard extends BaseDashboard
{
    protected static ?string $title = 'Dashboard';
    protected static ?string $navigationIcon = 'heroicon-o-home';
    protected static ?int $navigationSort = -2;

    public function getHeaderWidgetsColumns(): int | array
    {
        return 1;
    }

    protected function getHeaderActions(): array
    {
        return [
            ActionGroup::make([
                Action::make('createPost')
                    ->label('New Blog Post')
                    ->icon('heroicon-o-pencil-square')
                    ->url(route('filament.admin.resources.blog-posts.create'))
                    ->visible(fn () => auth()->user()->can('manage blog'))
                    ->openUrlInNewTab(false),

                Action::make('createEvent')
                    ->label('New Event')
                    ->icon('heroicon-o-calendar-days')
                    ->url(route('filament.admin.resources.events.create'))
                    ->visible(fn () => auth()->user()->can('manage events'))
                    ->openUrlInNewTab(false),

                Action::make('createProgram')
                    ->label('New Program')
                    ->icon('heroicon-o-rocket-launch')
                    ->url(route('filament.admin.resources.programs.create'))
                    ->visible(fn () => auth()->user()->can('manage programs'))
                    ->openUrlInNewTab(false),

                Action::make('viewVolunteers')
                    ->label('Pending Volunteers')
                    ->icon('heroicon-o-heart')
                    ->url(route('filament.admin.resources.volunteers.index'))
                    ->badge(fn () => Volunteer::where('status', 'pending')->count())
                    ->visible(fn () => auth()->user()->can('manage volunteers'))
                    ->openUrlInNewTab(false),

                Action::make('viewContact')
                    ->label('Unread Messages')
                    ->icon('heroicon-o-chat-bubble-left-right')
                    ->url(route('filament.admin.resources.contact-messages.index', [
                        'tableFilters[status][value]' => 'unread',
                    ]))
                    ->badge(fn () => \App\Models\ContactMessage::where('status', 'unread')->count())
                    ->color('danger')
                    ->visible(fn () => auth()->user()->can('manage contact'))
                    ->openUrlInNewTab(false),

                Action::make('viewRegistrations')
                    ->label('Event Registrations')
                    ->icon('heroicon-o-clipboard-document-list')
                    ->url(route('filament.admin.resources.event-registrations.index'))
                    ->visible(fn () => auth()->user()->can('manage events'))
                    ->openUrlInNewTab(false),
            ])
                ->label('Quick Actions')
                ->icon('heroicon-o-plus')
                ->color('primary')
                ->button(),
        ];
    }

    public function getHeaderWidgets(): array
    {
        return [
            \App\Filament\Widgets\WelcomeBanner::class,
        ];
    }

    public function getWidgets(): array
    {
        return [
            \App\Filament\Widgets\StatsOverviewWidget::class,
            \App\Filament\Widgets\BlogPostOverview::class,
            \App\Filament\Widgets\RecentRegistrationsTable::class,
        ];
    }
}
