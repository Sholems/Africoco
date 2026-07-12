<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AnnualReportResource\Pages;
use App\Models\AnnualReport;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Filters\SelectFilter;

class AnnualReportResource extends Resource
{
    protected static ?string $model = AnnualReport::class;

    protected static ?string $navigationGroup = 'Content';
    protected static ?string $navigationIcon = 'heroicon-o-document-chart-bar';
    protected static ?int $navigationSort = 8;
    protected static ?string $permission = 'manage pages';

    use \App\Filament\Traits\HasAdminPermission;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Group::make()
                    ->schema([
                        Forms\Components\Section::make('Report Details')
                            ->schema([
                                Forms\Components\TextInput::make('title')
                                    ->required()
                                    ->maxLength(255),
                                Forms\Components\Textarea::make('description')
                                    ->rows(3)
                                    ->columnSpanFull(),
                            ])->columns(2),
                    ])->columnSpan(2),
                Forms\Components\Group::make()
                    ->schema([
                        Forms\Components\Section::make('Classification')
                            ->schema([
                                Forms\Components\Select::make('type')
                                    ->options([
                                        'annual' => 'Annual Report',
                                        'financial' => 'Financial Report',
                                        'impact' => 'Impact Report',
                                        'strategic' => 'Strategic Plan',
                                    ])
                                    ->default('annual')
                                    ->required(),
                                Forms\Components\TextInput::make('year')
                                    ->numeric()
                                    ->required()
                                    ->minLength(4)
                                    ->maxLength(4)
                                    ->default(now()->year),
                                Forms\Components\Toggle::make('is_featured')
                                    ->label('Featured')
                                    ->inline(false),
                                Forms\Components\Toggle::make('is_active')
                                    ->label('Active')
                                    ->inline(false)
                                    ->default(true),
                            ]),
                        Forms\Components\Section::make('Files')
                            ->schema([
                                Forms\Components\FileUpload::make('file_path')
                                    ->label('PDF Report')
                                    ->acceptedFileTypes(['application/pdf'])
                                    ->disk('public')
                                    ->directory('reports')
                                    ->maxSize(51200),
                                Forms\Components\FileUpload::make('cover_image')
                                    ->label('Cover Image')
                                    ->image()
                                    ->disk('public')
                                    ->directory('reports/covers')
                                    ->imagePreviewHeight('80'),
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
                    ->limit(50),
                Tables\Columns\BadgeColumn::make('type')
                    ->colors([
                        'primary' => 'annual',
                        'warning' => 'financial',
                        'success' => 'impact',
                        'info' => 'strategic',
                    ]),
                Tables\Columns\TextColumn::make('year')
                    ->sortable(),
                Tables\Columns\IconColumn::make('is_featured')
                    ->boolean()
                    ->toggleable(),
                Tables\Columns\IconColumn::make('is_active')
                    ->boolean(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime('M d, Y')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort('year', 'desc')
            ->filters([
                SelectFilter::make('type')
                    ->options([
                        'annual' => 'Annual Report',
                        'financial' => 'Financial Report',
                        'impact' => 'Impact Report',
                        'strategic' => 'Strategic Plan',
                    ]),
                SelectFilter::make('year')
                    ->options(fn () => AnnualReport::select('year')->distinct()->pluck('year', 'year')->sort()->reverse()),
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
            'index' => Pages\ListAnnualReports::route('/'),
            'create' => Pages\CreateAnnualReport::route('/create'),
            'edit' => Pages\EditAnnualReport::route('/{record}/edit'),
        ];
    }
}
