<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PageSectionResource\Pages;
use App\Filament\Traits\HasAdminPermission;
use App\Models\PageSection;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Filters\SelectFilter;

class PageSectionResource extends Resource
{
    protected static ?string $model = PageSection::class;

    protected static ?string $navigationGroup = 'Content';
    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?int $navigationSort = 1;
    protected static ?string $permission = 'manage pages';

    use HasAdminPermission;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Group::make()
                    ->schema([
                        Forms\Components\Section::make('Content')
                            ->schema([
                                Forms\Components\TextInput::make('title')
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('subtitle')
                                    ->maxLength(255),
                                Forms\Components\RichEditor::make('body')
                                    ->columnSpanFull()
                                    ->toolbarButtons([
                                        'bold', 'italic', 'underline',
                                        'h2', 'h3', 'h4',
                                        'bulletList', 'orderedList',
                                        'link', 'blockquote',
                                    ]),
                            ])->columns(2),
                        Forms\Components\Section::make('Call to Action')
                            ->schema([
                                Forms\Components\TextInput::make('button_text')
                                    ->label('Button Text')
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('button_link')
                                    ->label('Button Link')
                                    ->maxLength(255),
                            ])->columns(2),
                    ])->columnSpan(2),
                Forms\Components\Group::make()
                    ->schema([
                        Forms\Components\Section::make('Placement')
                            ->schema([
                                Forms\Components\Select::make('page')
                                    ->options([
                                        'home' => 'Home',
                                        'about' => 'About',
                                        'programs' => 'Programs',
                                        'events' => 'Events',
                                        'blog' => 'Blog',
                                        'contact' => 'Contact',
                                    ])
                                    ->required()
                                    ->searchable(),
                                Forms\Components\TextInput::make('section_key')
                                    ->label('Section Key')
                                    ->required()
                                    ->maxLength(255)
                                    ->helperText('Unique identifier for this section (e.g., hero, mission, stats)'),
                                Forms\Components\TextInput::make('order')
                                    ->label('Sort Order')
                                    ->numeric()
                                    ->default(0)
                                    ->helperText('Lower numbers appear first'),
                            ]),
                        Forms\Components\Section::make('Media')
                            ->schema([
                                Forms\Components\FileUpload::make('image')
                                    ->label('Section Image')
                                    ->image()
                                    ->disk('public')
                                    ->directory('sections')
                                    ->imageResizeMode('cover')
                                    ->imageResizeTargetWidth(1920)
                                    ->imageResizeTargetHeight(800)
                                    ->imageCropAspectRatio('16:9')
                                    ->imagePreviewHeight('150')
                                    ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp'])
                                    ->maxSize(5120)
                                    ->helperText('Recommended: 1920×800px. Used as hero banner or section image.')
                                    ->columnSpanFull(),
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
                Tables\Columns\BadgeColumn::make('page')
                    ->sortable(),
                Tables\Columns\TextColumn::make('section_key')
                    ->label('Section')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('title')
                    ->searchable()
                    ->limit(40),
                Tables\Columns\ImageColumn::make('image')
                    ->square()
                    ->size(40),
                Tables\Columns\TextColumn::make('order')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\IconColumn::make('is_active')
                    ->boolean(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime('M d, Y')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort('page', 'order')
            ->filters([
                SelectFilter::make('page')
                    ->options([
                        'home' => 'Home',
                        'about' => 'About',
                        'programs' => 'Programs',
                        'events' => 'Events',
                        'blog' => 'Blog',
                        'contact' => 'Contact',
                    ]),
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
            'index' => Pages\ListPageSections::route('/'),
            'create' => Pages\CreatePageSection::route('/create'),
            'edit' => Pages\EditPageSection::route('/{record}/edit'),
        ];
    }
}
