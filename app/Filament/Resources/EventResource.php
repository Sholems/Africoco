<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EventResource\Pages;
use App\Filament\Traits\HasAdminPermission;
use App\Models\Event;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Filters\SelectFilter;

class EventResource extends Resource
{
    protected static ?string $model = Event::class;

    protected static ?string $navigationGroup = 'Content';
    protected static ?string $navigationIcon = 'heroicon-o-calendar-days';
    protected static ?int $navigationSort = 5;
    protected static ?string $permission = 'manage events';

    use HasAdminPermission;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Group::make()
                    ->schema([
                        Forms\Components\Section::make('Event Details')
                            ->schema([
                                Forms\Components\TextInput::make('title')
                                    ->required()
                                    ->maxLength(255)
                                    ->live(onBlur: true)
                                    ->afterStateUpdated(function (string $operation, $state, Forms\Set $set) {
                                        if ($operation === 'create') {
                                            $set('slug', str()->slug($state));
                                        }
                                    }),
                                Forms\Components\TextInput::make('slug')
                                    ->required()
                                    ->maxLength(255)
                                    ->unique(Event::class, 'slug', ignoreRecord: true),
                                Forms\Components\RichEditor::make('description')
                                    ->columnSpanFull()
                                    ->toolbarButtons(['bold', 'italic', 'bulletList', 'orderedList', 'link']),
                            ])->columns(2),
                        Forms\Components\Section::make('Date & Venue')
                            ->schema([
                                Forms\Components\DatePicker::make('start_date')
                                    ->required()
                                    ->native(false),
                                Forms\Components\DatePicker::make('end_date')
                                    ->native(false)
                                    ->afterOrEqual('start_date'),
                                Forms\Components\TimePicker::make('start_time')
                                    ->label('Start Time')
                                    ->seconds(false),
                                Forms\Components\TextInput::make('venue')
                                    ->maxLength(255),
                            ])->columns(2),
                    ])->columnSpan(2),
                Forms\Components\Group::make()
                    ->schema([
                        Forms\Components\Section::make('Status & Registration')
                            ->schema([
                                Forms\Components\Select::make('status')
                                    ->options([
                                        'upcoming' => 'Upcoming',
                                        'ongoing' => 'Ongoing',
                                        'completed' => 'Completed',
                                        'cancelled' => 'Cancelled',
                                    ])
                                    ->required()
                                    ->default('upcoming'),
                                Forms\Components\Toggle::make('registration_enabled')
                                    ->label('Enable Registration')
                                    ->required(),
                                Forms\Components\TextInput::make('registration_fee')
                                    ->numeric()
                                    ->prefix('₦')
                                    ->placeholder('0 for free'),
                            ]),
                        Forms\Components\Section::make('Media')
                            ->schema([
                                Forms\Components\FileUpload::make('banner')
                                    ->image()
                                    ->disk('public')
                                    ->directory('events'),
                            ]),
                    ])->columnSpan(1),
            ])->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->searchable()
                    ->sortable()
                    ->limit(40),
                Tables\Columns\TextColumn::make('start_date')
                    ->date('M d, Y')
                    ->sortable(),
                Tables\Columns\TextColumn::make('venue')
                    ->searchable()
                    ->toggleable(),
                Tables\Columns\BadgeColumn::make('status')
                    ->colors([
                        'success' => 'upcoming',
                        'warning' => 'ongoing',
                        'gray' => 'completed',
                        'danger' => 'cancelled',
                    ]),
                Tables\Columns\IconColumn::make('registration_enabled')
                    ->boolean()
                    ->label('Reg.'),
                Tables\Columns\TextColumn::make('registrations_count')
                    ->label('Registrations')
                    ->counts('registrations')
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('status')
                    ->options([
                        'upcoming' => 'Upcoming',
                        'ongoing' => 'Ongoing',
                        'completed' => 'Completed',
                        'cancelled' => 'Cancelled',
                    ]),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            EventResource\RelationManagers\RegistrationsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListEvents::route('/'),
            'create' => Pages\CreateEvent::route('/create'),
            'edit' => Pages\EditEvent::route('/{record}/edit'),
        ];
    }
}
