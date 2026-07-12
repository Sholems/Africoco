<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TeamMemberResource\Pages;
use App\Filament\Traits\HasAdminPermission;
use App\Models\TeamMember;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class TeamMemberResource extends Resource
{
    protected static ?string $model = TeamMember::class;

    protected static ?string $navigationGroup = 'Content';
    protected static ?string $navigationIcon = 'heroicon-o-users';
    protected static ?int $navigationSort = 6;
    protected static ?string $permission = 'manage team';

    use HasAdminPermission;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Group::make()
                    ->schema([
                        Forms\Components\Section::make('Member Details')
                            ->schema([
                                Forms\Components\TextInput::make('full_name')
                                    ->required()
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('position')
                                    ->required()
                                    ->maxLength(255),
                                Forms\Components\Textarea::make('bio')
                                    ->rows(4)
                                    ->columnSpanFull(),
                                Forms\Components\TextInput::make('display_order')
                                    ->label('Display Order')
                                    ->numeric()
                                    ->default(0)
                                    ->helperText('Lower numbers appear first'),
                            ])->columns(2),
                    ])->columnSpan(2),
                Forms\Components\Group::make()
                    ->schema([
                        Forms\Components\Section::make('Photo')
                            ->schema([
                                Forms\Components\FileUpload::make('photo')
                                    ->image()
                                    ->disk('public')
                                    ->directory('team')
                                    ->imagePreviewHeight('120')
                                    ->circleCropper(),
                            ]),
                        Forms\Components\Section::make('Social Links')
                            ->schema([
                                Forms\Components\TextInput::make('linkedin')
                                    ->url()
                                    ->maxLength(255)
                                    ->suffixIcon('heroicon-m-link'),
                                Forms\Components\TextInput::make('facebook')
                                    ->url()
                                    ->maxLength(255)
                                    ->suffixIcon('heroicon-m-link'),
                                Forms\Components\TextInput::make('twitter')
                                    ->url()
                                    ->maxLength(255)
                                    ->suffixIcon('heroicon-m-link'),
                            ]),
                        Forms\Components\Section::make('Status')
                            ->schema([
                                Forms\Components\Toggle::make('is_active')
                                    ->label('Active')
                                    ->inline(false),
                            ]),
                    ])->columnSpan(1),
            ])->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('photo')
                    ->circular()
                    ->size(45),
                Tables\Columns\TextColumn::make('full_name')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('position')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('display_order')
                    ->label('Order')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\IconColumn::make('is_active')
                    ->boolean(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime('M d, Y')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort('display_order')
            ->filters([
                Tables\Filters\TernaryFilter::make('is_active')
                    ->label('Active Only'),
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
            'index' => Pages\ListTeamMembers::route('/'),
            'create' => Pages\CreateTeamMember::route('/create'),
            'edit' => Pages\EditTeamMember::route('/{record}/edit'),
        ];
    }
}
