<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PillarResource\Pages;
use App\Models\Pillar;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class PillarResource extends Resource
{
    protected static ?string $model = Pillar::class;

    protected static ?string $navigationGroup = 'Content';
    protected static ?string $navigationIcon = 'heroicon-o-queue-list';
    protected static ?int $navigationSort = 2;
    protected static ?string $permission = 'manage pages';

    use \App\Filament\Traits\HasAdminPermission;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Group::make()
                    ->schema([
                        Forms\Components\Section::make('Pillar Details')
                            ->schema([
                                Forms\Components\TextInput::make('name')
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
                                    ->unique(Pillar::class, 'slug', ignoreRecord: true),
                                Forms\Components\Textarea::make('description')
                                    ->rows(4)
                                    ->columnSpanFull(),
                            ])->columns(2),
                    ])->columnSpan(2),
                Forms\Components\Group::make()
                    ->schema([
                        Forms\Components\Section::make('Display')
                            ->schema([
                                Forms\Components\TextInput::make('icon')
                                    ->maxLength(255)
                                    ->helperText('SVG icon name or path'),
                                Forms\Components\Select::make('color')
                                    ->options([
                                        'emerald' => 'Emerald',
                                        'amber' => 'Amber',
                                        'blue' => 'Blue',
                                        'purple' => 'Purple',
                                        'rose' => 'Rose',
                                        'teal' => 'Teal',
                                    ])
                                    ->default('emerald'),
                                Forms\Components\TextInput::make('display_order')
                                    ->label('Sort Order')
                                    ->numeric()
                                    ->default(0),
                                Forms\Components\Toggle::make('is_active')
                                    ->label('Active')
                                    ->inline(false)
                                    ->default(true),
                            ]),
                        Forms\Components\Section::make('Banner')
                            ->schema([
                                Forms\Components\FileUpload::make('banner')
                                    ->image()
                                    ->disk('public')
                                    ->directory('pillars')
                                    ->imagePreviewHeight('100'),
                            ]),
                    ])->columnSpan(1),
            ])->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('display_order')
                    ->numeric()
                    ->sortable()
                    ->toggleable(),
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('slug')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('programs_count')
                    ->label('Programs')
                    ->counts('programs')
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
            ])
            ->reorderable('display_order');
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPillars::route('/'),
            'create' => Pages\CreatePillar::route('/create'),
            'edit' => Pages\EditPillar::route('/{record}/edit'),
        ];
    }
}
