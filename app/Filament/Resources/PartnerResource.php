<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PartnerResource\Pages;
use App\Filament\Traits\HasAdminPermission;
use App\Models\Partner;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Filters\SelectFilter;

class PartnerResource extends Resource
{
    protected static ?string $model = Partner::class;

    protected static ?string $navigationGroup = 'Engagement';
    protected static ?string $navigationIcon = 'heroicon-o-arrows-right-left';
    protected static ?int $navigationSort = 4;
    protected static ?string $permission = 'manage partners';

    use HasAdminPermission;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Group::make()
                    ->schema([
                        Forms\Components\Section::make('Organization Details')
                            ->schema([
                                Forms\Components\TextInput::make('organization_name')
                                    ->required()
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('website')
                                    ->url()
                                    ->maxLength(255)
                                    ->suffixIcon('heroicon-m-globe-alt'),
                                Forms\Components\Textarea::make('description')
                                    ->rows(4)
                                    ->columnSpanFull(),
                                Forms\Components\TextInput::make('csr_area')
                                    ->label('CSR Focus Areas')
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('recognition_level')
                                    ->label('Recognition Level')
                                    ->maxLength(255),
                            ])->columns(2),
                    ])->columnSpan(2),
                Forms\Components\Group::make()
                    ->schema([
                        Forms\Components\Section::make('Categorization')
                            ->schema([
                                Forms\Components\Select::make('category')
                                    ->options([
                                        'Partner' => 'Partner',
                                        'Sponsor' => 'Sponsor',
                                        'Government' => 'Government',
                                        'NGO' => 'NGO',
                                        'Corporate' => 'Corporate',
                                        'Donor' => 'Donor',
                                    ])
                                    ->required()
                                    ->searchable(),
                                Forms\Components\Toggle::make('show_on_homepage')
                                    ->label('Show on Homepage')
                                    ->inline(false),
                                Forms\Components\Toggle::make('is_active')
                                    ->label('Active')
                                    ->inline(false),
                            ]),
                        Forms\Components\Section::make('Contact & Documents')
                            ->schema([
                                Forms\Components\TextInput::make('contact_person')
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('contact_email')
                                    ->email()
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('contact_phone')
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('social_links')
                                    ->label('Social Media Links (comma separated)')
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('amount_sponsored')
                                    ->label('Amount Sponsored (₦)')
                                    ->numeric(),
                                Forms\Components\FileUpload::make('documents')
                                    ->multiple()
                                    ->acceptedFileTypes(['application/pdf'])
                                    ->disk('public')
                                    ->directory('partners/docs'),
                            ]),
                        Forms\Components\Section::make('Logo')
                            ->schema([
                                Forms\Components\FileUpload::make('logo')
                                    ->image()
                                    ->disk('public')
                                    ->directory('partners')
                                    ->imagePreviewHeight('80'),
                            ]),
                    ])->columnSpan(1),
            ])->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('logo')
                    ->circular()
                    ->size(50),
                Tables\Columns\TextColumn::make('organization_name')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\BadgeColumn::make('category')
                    ->colors([
                        'primary' => 'Partner',
                        'warning' => 'Sponsor',
                        'info' => 'Government',
                        'success' => 'NGO',
                        'gray' => 'Corporate',
                        'danger' => 'Donor',
                    ])
                    ->sortable(),
                Tables\Columns\TextColumn::make('website')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\IconColumn::make('show_on_homepage')
                    ->label('Homepage')
                    ->boolean(),
                Tables\Columns\IconColumn::make('is_active')
                    ->boolean(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime('M d, Y')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort('organization_name')
            ->filters([
                SelectFilter::make('category')
                    ->options([
                        'Partner' => 'Partner',
                        'Sponsor' => 'Sponsor',
                        'Government' => 'Government',
                        'NGO' => 'NGO',
                        'Corporate' => 'Corporate',
                        'Donor' => 'Donor',
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
            'index' => Pages\ListPartners::route('/'),
            'create' => Pages\CreatePartner::route('/create'),
            'edit' => Pages\EditPartner::route('/{record}/edit'),
        ];
    }
}
