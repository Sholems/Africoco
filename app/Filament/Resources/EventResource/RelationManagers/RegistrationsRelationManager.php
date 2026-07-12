<?php

namespace App\Filament\Resources\EventResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Filters\SelectFilter;

class RegistrationsRelationManager extends RelationManager
{
    protected static string $relationship = 'registrations';

    protected static ?string $recordTitleAttribute = 'full_name';

    protected static ?string $title = 'Event Registrations';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Registrant Information')
                    ->schema([
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
                    ])->columns(2),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('full_name')
            ->columns([
                Tables\Columns\TextColumn::make('full_name')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable()
                    ->toggleable(),
                Tables\Columns\TextColumn::make('organization')
                    ->searchable()
                    ->toggleable(),
                Tables\Columns\BadgeColumn::make('ticket_type')
                    ->colors([
                        'gray' => 'Free',
                        'primary' => 'Standard',
                        'warning' => 'VIP',
                        'success' => 'VVIP',
                        'info' => 'Group',
                    ]),
                Tables\Columns\TextColumn::make('amount')
                    ->money('NGN')
                    ->sortable(),
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
                    ->label('Registered')
                    ->dateTime('M d, Y')
                    ->sortable(),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
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
            ->headerActions([
                Tables\Actions\CreateAction::make()
                    ->mutateFormDataUsing(function (array $data): array {
                        $data['event_id'] = $this->getOwnerRecord()->id;
                        return $data;
                    }),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
