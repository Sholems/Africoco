<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MediaResource\Pages;
use App\Filament\Traits\HasAdminPermission;
use App\Models\Media;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Support\Facades\Storage;

class MediaResource extends Resource
{
    protected static ?string $model = Media::class;

    protected static ?string $navigationGroup = 'Content';
    protected static ?string $navigationIcon = 'heroicon-o-photo';
    protected static ?int $navigationSort = 0;
    protected static ?string $permission = 'manage gallery';

    use HasAdminPermission;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Group::make()
                    ->schema([
                        Forms\Components\Section::make('Upload Image')
                            ->schema([
                                Forms\Components\FileUpload::make('filename')
                                    ->label('Image')
                                    ->image()
                                    ->required()
                                    ->disk('public')
                                    ->directory('uploads')
                                    ->imageResizeMode('cover')
                                    ->imageResizeTargetWidth(1920)
                                    ->imageResizeTargetHeight(1080)
                                    ->imageCropAspectRatio('16:9')
                                    ->imagePreviewHeight('200')
                                    ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp'])
                                    ->maxSize(5120)
                                    ->afterStateUpdated(function ($state, callable $set) {
                                        if ($state) {
                                            $set('original_name', $state->getClientOriginalName());
                                            $set('mime_type', $state->getMimeType());
                                            $set('file_size', $state->getSize());
                                        }
                                    })
                                    ->columnSpanFull(),
                            ]),
                    ])->columnSpan(2),
                Forms\Components\Group::make()
                    ->schema([
                        Forms\Components\Section::make('Details')
                            ->schema([
                                Forms\Components\TextInput::make('original_name')
                                    ->label('File Name')
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('alt_text')
                                    ->label('Alt Text')
                                    ->maxLength(255)
                                    ->helperText('Descriptive text for accessibility'),
                                Forms\Components\Select::make('collection')
                                    ->label('Collection')
                                    ->options([
                                        'uploads' => 'General Uploads',
                                        'sections' => 'Page Sections',
                                        'gallery' => 'Gallery',
                                        'blog' => 'Blog Posts',
                                        'programs' => 'Programs',
                                        'partners' => 'Partners',
                                        'events' => 'Events',
                                        'team' => 'Team',
                                    ])
                                    ->default('uploads')
                                    ->searchable(),
                            ]),
                        Forms\Components\Section::make('File Info')
                            ->schema([
                                Forms\Components\Placeholder::make('file_size_display')
                                    ->label('File Size')
                                    ->content(fn ($record) => $record?->size_for_humans ?? '—'),
                                Forms\Components\Placeholder::make('mime_type')
                                    ->label('Type')
                                    ->content(fn ($record) => $record?->mime_type ?? '—'),
                                Forms\Components\Placeholder::make('created_at_display')
                                    ->label('Uploaded')
                                    ->content(fn ($record) => $record?->created_at?->format('M d, Y g:i A') ?? '—'),
                            ]),
                    ])->columnSpan(1),
            ])->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->contentGrid([
                'md' => 2,
                'lg' => 3,
                'xl' => 4,
            ])
            ->columns([
                Tables\Columns\ImageColumn::make('filename')
                    ->disk('public')
                    ->height(180)
                    ->width('100%')
                    ->extraImgAttributes(['class' => 'object-cover w-full h-44 rounded-t-lg']),
                Tables\Columns\TextColumn::make('original_name')
                    ->label('File')
                    ->searchable()
                    ->limit(30)
                    ->extraAttributes(['class' => 'px-3 py-1']),
                Tables\Columns\TextColumn::make('collection')
                    ->badge()
                    ->extraAttributes(['class' => 'px-3 py-1']),
                Tables\Columns\TextColumn::make('file_size')
                    ->label('Size')
                    ->formatStateUsing(fn ($state) => $state ? round($state / 1024, 1) . ' KB' : '—')
                    ->extraAttributes(['class' => 'px-3 py-1 text-xs text-gray-500']),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Uploaded')
                    ->dateTime('M d, Y')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                SelectFilter::make('collection')
                    ->options([
                        'uploads' => 'General Uploads',
                        'sections' => 'Page Sections',
                        'gallery' => 'Gallery',
                        'blog' => 'Blog Posts',
                        'programs' => 'Programs',
                        'partners' => 'Partners',
                        'events' => 'Events',
                        'team' => 'Team',
                    ]),
            ])
            ->actions([
                // Preview action — opens a modal with the full image
                Tables\Actions\Action::make('preview')
                    ->label('Preview')
                    ->icon('heroicon-o-eye')
                    ->color('info')
                    ->modalHeading(fn (Media $record) => $record->original_name)
                    ->modalContent(fn (Media $record) => view('filament.media-preview', [
                        'url' => $record->url,
                        'alt' => $record->alt_text ?? $record->original_name,
                        'original_name' => $record->original_name,
                        'size' => $record->size_for_humans,
                        'type' => $record->mime_type,
                        'collection' => $record->collection,
                        'uploaded' => $record->created_at?->format('M d, Y g:i A'),
                    ]))
                    ->modalSubmitAction(false)
                    ->modalCancelActionLabel('Close'),

                Tables\Actions\EditAction::make()
                    ->modalWidth('2xl'),

                Tables\Actions\DeleteAction::make()
                    ->after(fn (Media $record) => static::deleteFile($record)),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()
                        ->after(fn ($records) => $records->each(fn (Media $record) => static::deleteFile($record))),
                ]),
            ])
            ->recordUrl(null)
            ->recordAction('preview');
    }

    protected static function deleteFile(Media $record): void
    {
        Storage::disk($record->disk)->delete($record->filename);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMedia::route('/'),
            'create' => Pages\CreateMedia::route('/create'),
            'edit' => Pages\EditMedia::route('/{record}/edit'),
        ];
    }
}
