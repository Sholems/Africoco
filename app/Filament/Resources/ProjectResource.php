<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProjectResource\Pages;
use App\Models\Project;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Filters\SelectFilter;

class ProjectResource extends Resource
{
    protected static ?string $model = Project::class;

    protected static ?string $navigationGroup = 'Content';
    protected static ?string $navigationIcon = 'heroicon-o-folder';
    protected static ?int $navigationSort = 5;
    protected static ?string $permission = 'manage projects';

    use \App\Filament\Traits\HasAdminPermission;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Group::make()
                    ->schema([
                        Forms\Components\Section::make('Project Details')
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
                                    ->unique(Project::class, 'slug', ignoreRecord: true),
                                Forms\Components\RichEditor::make('description')
                                    ->label('Description')
                                    ->columnSpanFull()
                                    ->toolbarButtons(['bold', 'italic', 'bulletList', 'orderedList', 'link', 'blockquote']),
                                Forms\Components\RichEditor::make('objectives')
                                    ->label('Objectives')
                                    ->columnSpanFull()
                                    ->toolbarButtons(['bold', 'italic', 'bulletList', 'orderedList']),
                            ])->columns(2),
                    ])->columnSpan(2),
                Forms\Components\Group::make()
                    ->schema([
                        Forms\Components\Section::make('Funding')
                            ->schema([
                                Forms\Components\TextInput::make('budget')
                                    ->numeric()
                                    ->prefix('₦')
                                    ->maxLength(15),
                                Forms\Components\TextInput::make('amount_raised')
                                    ->numeric()
                                    ->prefix('₦')
                                    ->default(0),
                                Forms\Components\TextInput::make('funding_required')
                                    ->numeric()
                                    ->prefix('₦'),
                            ]),
                        Forms\Components\Section::make('Timeline')
                            ->schema([
                                Forms\Components\DatePicker::make('start_date'),
                                Forms\Components\DatePicker::make('end_date'),
                            ]),
                        Forms\Components\Section::make('Classification')
                            ->schema([
                                Forms\Components\Select::make('pillar_id')
                                    ->label('Strategic Pillar')
                                    ->relationship('pillar', 'name')
                                    ->searchable(),
                                Forms\Components\Select::make('status')
                                    ->options([
                                        'draft' => 'Draft',
                                        'active' => 'Active',
                                        'completed' => 'Completed',
                                        'on_hold' => 'On Hold',
                                    ])
                                    ->default('draft')
                                    ->required(),
                                Forms\Components\TextInput::make('progress')
                                    ->numeric()
                                    ->suffix('%')
                                    ->minValue(0)
                                    ->maxValue(100)
                                    ->default(0),
                                Forms\Components\Toggle::make('is_featured')
                                    ->label('Featured Project')
                                    ->inline(false),
                                Forms\Components\Toggle::make('is_active')
                                    ->label('Active')
                                    ->inline(false)
                                    ->default(true),
                            ]),
                        Forms\Components\Section::make('Media')
                            ->schema([
                                Forms\Components\FileUpload::make('featured_image')
                                    ->image()
                                    ->disk('public')
                                    ->directory('projects')
                                    ->imagePreviewHeight('100'),
                                Forms\Components\FileUpload::make('gallery')
                                    ->multiple()
                                    ->image()
                                    ->disk('public')
                                    ->directory('projects/gallery'),
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
                Tables\Columns\BadgeColumn::make('status')
                    ->colors([
                        'gray' => 'draft',
                        'success' => 'active',
                        'info' => 'completed',
                        'warning' => 'on_hold',
                    ]),
                Tables\Columns\TextColumn::make('pillar.name')
                    ->label('Pillar')
                    ->toggleable(),
                Tables\Columns\TextColumn::make('budget')
                    ->money('NGN')
                    ->toggleable(),
                Tables\Columns\TextColumn::make('funding_progress')
                    ->label('Progress')
                    ->suffix('%'),
                Tables\Columns\IconColumn::make('is_featured')
                    ->boolean()
                    ->toggleable(),
                Tables\Columns\IconColumn::make('is_active')
                    ->boolean(),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                SelectFilter::make('status')
                    ->options([
                        'draft' => 'Draft',
                        'active' => 'Active',
                        'completed' => 'Completed',
                        'on_hold' => 'On Hold',
                    ]),
                SelectFilter::make('pillar_id')
                    ->label('Strategic Pillar')
                    ->relationship('pillar', 'name'),
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
            'index' => Pages\ListProjects::route('/'),
            'create' => Pages\CreateProject::route('/create'),
            'edit' => Pages\EditProject::route('/{record}/edit'),
        ];
    }
}
