<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProgramResource\Pages;
use App\Filament\Traits\HasAdminPermission;
use App\Models\Program;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Filters\SelectFilter;

class ProgramResource extends Resource
{
    protected static ?string $model = Program::class;

    protected static ?string $navigationGroup = 'Content';
    protected static ?string $navigationIcon = 'heroicon-o-rocket-launch';
    protected static ?int $navigationSort = 4;
    protected static ?string $permission = 'manage programs';

    use HasAdminPermission;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Group::make()
                    ->schema([
                        Forms\Components\Section::make('Program Content')
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
                                    ->unique(Program::class, 'slug', ignoreRecord: true),
                                Forms\Components\Textarea::make('short_description')
                                    ->rows(3)
                                    ->columnSpanFull(),
                                Forms\Components\RichEditor::make('full_description')
                                    ->label('Full Description')
                                    ->columnSpanFull()
                                    ->toolbarButtons([
                                        'bold', 'italic', 'underline', 'strike',
                                        'h2', 'h3', 'h4',
                                        'bulletList', 'orderedList',
                                        'link', 'blockquote',
                                    ]),
                            ])->columns(2),
                    ])->columnSpan(2),
                Forms\Components\Group::make()
                    ->schema([
                        Forms\Components\Section::make('Media & Icon')
                            ->schema([
                                Forms\Components\FileUpload::make('featured_image')
                                    ->image()
                                    ->disk('public')
                                    ->directory('programs')
                                    ->imagePreviewHeight('100'),
                                Forms\Components\TextInput::make('icon')
                                    ->maxLength(255)
                                    ->helperText('Font Awesome icon class (e.g., fa-seedling)'),
                            ]),
                        Forms\Components\Section::make('Classification')
                            ->schema([
                                Forms\Components\Select::make('pillar_id')
                                    ->label('Strategic Pillar')
                                    ->relationship('pillar', 'name')
                                    ->searchable()
                                    ->preload(),
                                Forms\Components\Select::make('focus_area')
                                    ->label('Focus Area')
                                    ->options([
                                        'Agriculture' => 'Agriculture',
                                        'Education' => 'Education',
                                        'Environment' => 'Environment',
                                        'Culture' => 'Culture',
                                        'Community' => 'Community Development',
                                        'Economic' => 'Economic Empowerment',
                                    ])
                                    ->searchable(),
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
                Tables\Columns\ImageColumn::make('featured_image')
                    ->square()
                    ->size(50),
                Tables\Columns\TextColumn::make('title')
                    ->searchable()
                    ->sortable()
                    ->limit(40),
                Tables\Columns\BadgeColumn::make('focus_area')
                    ->sortable(),
                Tables\Columns\TextColumn::make('icon')
                    ->searchable()
                    ->toggleable(),
                Tables\Columns\IconColumn::make('is_active')
                    ->boolean(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime('M d, Y')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('focus_area')
                    ->label('Focus Area')
                    ->options([
                        'Agriculture' => 'Agriculture',
                        'Education' => 'Education',
                        'Environment' => 'Environment',
                        'Culture' => 'Culture',
                        'Community' => 'Community Development',
                        'Economic' => 'Economic Empowerment',
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
            'index' => Pages\ListPrograms::route('/'),
            'create' => Pages\CreateProgram::route('/create'),
            'edit' => Pages\EditProgram::route('/{record}/edit'),
        ];
    }
}
