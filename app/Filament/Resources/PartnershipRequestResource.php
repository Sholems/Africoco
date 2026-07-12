<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PartnershipRequestResource\Pages;
use App\Models\PartnershipRequest;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Filters\SelectFilter;

class PartnershipRequestResource extends Resource
{
    protected static ?string $model = PartnershipRequest::class;

    protected static ?string $navigationGroup = 'Engagement';
    protected static ?string $navigationIcon = 'heroicon-o-user-group';
    protected static ?int $navigationSort = 0;
    protected static ?string $permission = 'manage partners';

    use \App\Filament\Traits\HasAdminPermission;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Organization Information')
                    ->schema([
                        Forms\Components\TextInput::make('organization_name')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('industry')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('country')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('csr_interest')
                            ->label('CSR Interest Areas')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('budget')
                            ->numeric()
                            ->prefix('₦'),
                    ])->columns(2),
                Forms\Components\Section::make('Contact Information')
                    ->schema([
                        Forms\Components\TextInput::make('contact_name')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('email')
                            ->email()
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('phone')
                            ->maxLength(255),
                    ])->columns(3),
                Forms\Components\Section::make('Details')
                    ->schema([
                        Forms\Components\Textarea::make('message')
                            ->rows(4)
                            ->columnSpanFull(),
                        Forms\Components\Select::make('status')
                            ->options([
                                'pending' => 'Pending',
                                'reviewing' => 'Reviewing',
                                'contacted' => 'Contacted',
                                'approved' => 'Approved',
                                'declined' => 'Declined',
                            ])
                            ->default('pending')
                            ->required(),
                        Forms\Components\Textarea::make('notes')
                            ->label('Internal Notes')
                            ->rows(3)
                            ->columnSpanFull(),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('organization_name')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('contact_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable(),
                Tables\Columns\BadgeColumn::make('status')
                    ->colors([
                        'warning' => 'pending',
                        'info' => 'reviewing',
                        'primary' => 'contacted',
                        'success' => 'approved',
                        'danger' => 'declined',
                    ]),
                Tables\Columns\TextColumn::make('industry')
                    ->toggleable(),
                Tables\Columns\TextColumn::make('country')
                    ->toggleable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime('M d, Y')
                    ->sortable(),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                SelectFilter::make('status')
                    ->options([
                        'pending' => 'Pending',
                        'reviewing' => 'Reviewing',
                        'contacted' => 'Contacted',
                        'approved' => 'Approved',
                        'declined' => 'Declined',
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
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPartnershipRequests::route('/'),
            'create' => Pages\CreatePartnershipRequest::route('/create'),
            'edit' => Pages\EditPartnershipRequest::route('/{record}/edit'),
        ];
    }
}
