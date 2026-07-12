<?php

namespace App\Filament\Widgets;

use App\Models\EventRegistration;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class RecentRegistrationsTable extends BaseWidget
{
    protected static ?string $heading = 'Recent Event Registrations';
    protected static ?string $pollingInterval = '60s';
    protected int | string | array $columnSpan = 'full';

    public function table(Table $table): Table
    {
        return $table
            ->query(
                EventRegistration::with('event')
                    ->latest()
                    ->limit(10)
            )
            ->columns([
                Tables\Columns\TextColumn::make('full_name')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('event.title')
                    ->label('Event')
                    ->limit(30),
                Tables\Columns\BadgeColumn::make('ticket_type')
                    ->colors([
                        'gray' => 'Free',
                        'primary' => 'Standard',
                        'warning' => 'VIP',
                        'success' => 'VVIP',
                        'info' => 'Group',
                    ]),
                Tables\Columns\BadgeColumn::make('payment_status')
                    ->colors([
                        'warning' => 'pending',
                        'success' => 'completed',
                        'danger' => 'failed',
                    ]),
                Tables\Columns\BadgeColumn::make('registration_status')
                    ->colors([
                        'gray' => 'registered',
                        'success' => 'confirmed',
                        'danger' => 'cancelled',
                        'primary' => 'attended',
                    ]),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Registered')
                    ->dateTime('M d, Y H:i')
                    ->sortable(),
            ])
            ->filters([])
            ->actions([])
            ->bulkActions([]);
    }
}
