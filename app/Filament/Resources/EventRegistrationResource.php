<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EventRegistrationResource\Pages;
use App\Filament\Traits\HasAdminPermission;
use App\Models\EventRegistration;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Filters\SelectFilter;

class EventRegistrationResource extends Resource
{
    protected static ?string $model = EventRegistration::class;

    protected static ?string $navigationGroup = 'Operations';
    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-list';
    protected static ?int $navigationSort = 2;
    protected static ?string $modelLabel = 'Registration';
    protected static ?string $pluralModelLabel = 'Event Registrations';
    protected static ?string $permission = 'manage events';

    use HasAdminPermission;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Group::make()
                    ->schema([
                        Forms\Components\Section::make('Registrant Information')
                            ->schema([
                                Forms\Components\Select::make('event_id')
                                    ->label('Event')
                                    ->relationship('event', 'title')
                                    ->searchable()
                                    ->preload()
                                    ->required(),
                                Forms\Components\TextInput::make('full_name')
                                    ->required()
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('email')
                                    ->email()
                                    ->required()
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('phone')
                                    ->tel()
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('organization')
                                    ->maxLength(255),
                            ])->columns(2),
                    ])->columnSpan(2),
                Forms\Components\Group::make()
                    ->schema([
                        Forms\Components\Section::make('Registration Details')
                            ->schema([
                                Forms\Components\Select::make('ticket_type')
                                    ->options([
                                        'Free' => 'Free',
                                        'Standard' => 'Standard',
                                        'VIP' => 'VIP',
                                        'VVIP' => 'VVIP',
                                        'Group' => 'Group',
                                    ])
                                    ->default('Free'),
                                Forms\Components\TextInput::make('amount')
                                    ->numeric()
                                    ->prefix('₦')
                                    ->minValue(0),
                                Forms\Components\Select::make('payment_status')
                                    ->options([
                                        'pending' => 'Pending',
                                        'completed' => 'Completed',
                                        'failed' => 'Failed',
                                        'refunded' => 'Refunded',
                                    ])
                                    ->required()
                                    ->default('pending'),
                                Forms\Components\Select::make('registration_status')
                                    ->options([
                                        'registered' => 'Registered',
                                        'confirmed' => 'Confirmed',
                                        'cancelled' => 'Cancelled',
                                        'attended' => 'Attended',
                                    ])
                                    ->required()
                                    ->default('registered'),
                                Forms\Components\TextInput::make('payment_reference')
                                    ->maxLength(255),
                            ]),
                    ])->columnSpan(1),
            ])->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('event.title')
                    ->label('Event')
                    ->searchable()
                    ->sortable()
                    ->limit(30),
                Tables\Columns\TextColumn::make('full_name')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable()
                    ->toggleable(),
                Tables\Columns\TextColumn::make('organization')
                    ->searchable()
                    ->toggleable(),
                Tables\Columns\TextColumn::make('ticket_type')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'Free' => 'gray',
                        'Standard' => 'primary',
                        'VIP' => 'warning',
                        'VVIP' => 'success',
                        'Group' => 'info',
                        default => 'gray',
                    }),
                Tables\Columns\TextColumn::make('amount')
                    ->money('NGN')
                    ->sortable()
                    ->toggleable(),
                Tables\Columns\BadgeColumn::make('payment_status')
                    ->colors([
                        'warning' => 'pending',
                        'success' => 'completed',
                        'danger' => 'failed',
                        'gray' => 'refunded',
                    ]),
                Tables\Columns\BadgeColumn::make('registration_status')
                    ->colors([
                        'gray' => 'registered',
                        'success' => 'confirmed',
                        'danger' => 'cancelled',
                        'primary' => 'attended',
                    ]),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime('M d, Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                SelectFilter::make('event_id')
                    ->label('Event')
                    ->relationship('event', 'title'),
                SelectFilter::make('payment_status')
                    ->options([
                        'pending' => 'Pending',
                        'completed' => 'Completed',
                        'failed' => 'Failed',
                        'refunded' => 'Refunded',
                    ]),
                SelectFilter::make('registration_status')
                    ->options([
                        'registered' => 'Registered',
                        'confirmed' => 'Confirmed',
                        'cancelled' => 'Cancelled',
                        'attended' => 'Attended',
                    ]),
                SelectFilter::make('ticket_type')
                    ->options([
                        'Free' => 'Free',
                        'Standard' => 'Standard',
                        'VIP' => 'VIP',
                        'VVIP' => 'VVIP',
                        'Group' => 'Group',
                    ]),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\BulkAction::make('exportCsv')
                        ->label('Export CSV')
                        ->icon('heroicon-o-arrow-down-tray')
                        ->color('success')
                        ->action(function ($records) {
                            $headers = [
                                'Content-Type' => 'text/csv; charset=utf-8',
                                'Content-Disposition' => 'attachment; filename="registrations-' . now()->format('Y-m-d') . '.csv"',
                            ];

                            $callback = function () use ($records) {
                                $file = fopen('php://output', 'w');
                                fputs($file, \chr(0xEF) . \chr(0xBB) . \chr(0xBF)); // BOM for Excel UTF-8

                                fputcsv($file, [
                                    'Event', 'Full Name', 'Email', 'Phone',
                                    'Organization', 'Ticket Type', 'Amount (NGN)',
                                    'Payment Status', 'Registration Status',
                                    'Payment Reference', 'Date'
                                ]);

                                foreach ($records as $record) {
                                    fputcsv($file, [
                                        $record->event?->title,
                                        $record->full_name,
                                        $record->email,
                                        $record->phone,
                                        $record->organization,
                                        $record->ticket_type,
                                        $record->amount,
                                        $record->payment_status,
                                        $record->registration_status,
                                        $record->payment_reference,
                                        $record->created_at?->format('M d, Y H:i'),
                                    ]);
                                }

                                fclose($file);
                            };

                            return response()->stream($callback, 200, $headers);
                        })
                        ->visible(fn () => auth()->user()->can('export data')),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListEventRegistrations::route('/'),
            'create' => Pages\CreateEventRegistration::route('/create'),
            'edit' => Pages\EditEventRegistration::route('/{record}/edit'),
        ];
    }
}
