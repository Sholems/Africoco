<?php

namespace App\Filament\Resources;

use App\Filament\Resources\VolunteerResource\Pages;
use App\Filament\Traits\HasAdminPermission;
use App\Models\Volunteer;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Filters\SelectFilter;

class VolunteerResource extends Resource
{
    protected static ?string $model = Volunteer::class;

    protected static ?string $navigationGroup = 'Engagement';
    protected static ?string $navigationIcon = 'heroicon-o-heart';
    protected static ?int $navigationSort = 1;
    protected static ?string $permission = 'manage volunteers';

    use HasAdminPermission;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Group::make()
                    ->schema([
                        Forms\Components\Section::make('Personal Information')
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
                                Forms\Components\TextInput::make('location')
                                    ->maxLength(255),
                            ])->columns(2),
                        Forms\Components\Section::make('Application Details')
                            ->schema([
                                Forms\Components\Select::make('area_of_interest')
                                    ->label('Area of Interest')
                                    ->options([
                                        'Coconut Farming & Agriculture' => 'Coconut Farming & Agriculture',
                                        'Community Outreach & Education' => 'Community Outreach & Education',
                                        'Event Planning & Coordination' => 'Event Planning & Coordination',
                                        'Youth Mentorship & Training' => 'Youth Mentorship & Training',
                                        'Environmental & Sustainability' => 'Environmental & Sustainability',
                                        'Arts, Culture & Tourism' => 'Arts, Culture & Tourism',
                                        'Administrative Support' => 'Administrative Support',
                                    ])
                                    ->searchable(),
                                Forms\Components\Textarea::make('skills')
                                    ->rows(3),
                                Forms\Components\Textarea::make('message')
                                    ->rows(4),
                            ]),
                    ])->columnSpan(2),
                Forms\Components\Group::make()
                    ->schema([
                        Forms\Components\Section::make('Status')
                            ->schema([
                                Forms\Components\Select::make('status')
                                    ->options([
                                        'pending' => 'Pending',
                                        'approved' => 'Approved',
                                        'contacted' => 'Contacted',
                                        'rejected' => 'Rejected',
                                    ])
                                    ->required()
                                    ->default('pending'),
                            ]),
                        Forms\Components\Section::make('Timestamps')
                            ->schema([
                                Forms\Components\Placeholder::make('created_at')
                                    ->label('Applied')
                                    ->content(fn ($record): string => $record?->created_at?->format('M d, Y H:i') ?? '-'),
                                Forms\Components\Placeholder::make('updated_at')
                                    ->label('Last Updated')
                                    ->content(fn ($record): string => $record?->updated_at?->format('M d, Y H:i') ?? '-'),
                            ]),
                    ])->columnSpan(1),
            ])->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('full_name')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable()
                    ->toggleable(),
                Tables\Columns\TextColumn::make('phone')
                    ->searchable()
                    ->toggleable(),
                Tables\Columns\TextColumn::make('location')
                    ->searchable()
                    ->toggleable(),
                Tables\Columns\TextColumn::make('area_of_interest')
                    ->label('Interest')
                    ->searchable()
                    ->toggleable(),
                Tables\Columns\BadgeColumn::make('status')
                    ->colors([
                        'warning' => 'pending',
                        'success' => 'approved',
                        'info' => 'contacted',
                        'danger' => 'rejected',
                    ]),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Applied')
                    ->dateTime('M d, Y')
                    ->sortable(),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                SelectFilter::make('status')
                    ->options([
                        'pending' => 'Pending',
                        'approved' => 'Approved',
                        'contacted' => 'Contacted',
                        'rejected' => 'Rejected',
                    ]),
                SelectFilter::make('area_of_interest')
                    ->label('Interest Area')
                    ->options([
                        'Coconut Farming & Agriculture' => 'Coconut Farming & Agriculture',
                        'Community Outreach & Education' => 'Community Outreach & Education',
                        'Event Planning & Coordination' => 'Event Planning & Coordination',
                        'Youth Mentorship & Training' => 'Youth Mentorship & Training',
                        'Environmental & Sustainability' => 'Environmental & Sustainability',
                        'Arts, Culture & Tourism' => 'Arts, Culture & Tourism',
                        'Administrative Support' => 'Administrative Support',
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
            'index' => Pages\ListVolunteers::route('/'),
            'create' => Pages\CreateVolunteer::route('/create'),
            'edit' => Pages\EditVolunteer::route('/{record}/edit'),
        ];
    }
}
