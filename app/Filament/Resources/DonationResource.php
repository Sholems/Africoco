<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DonationResource\Pages;
use App\Filament\Traits\HasAdminPermission;
use App\Models\Donation;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Filters\SelectFilter;

class DonationResource extends Resource
{
    protected static ?string $model = Donation::class;

    protected static ?string $navigationGroup = 'Donations & Finance';
    protected static ?string $navigationIcon = 'heroicon-o-currency-dollar';
    protected static ?int $navigationSort = 1;
    protected static ?string $permission = 'manage donations';

    use HasAdminPermission;

    public static function shouldRegisterNavigation(): bool
    {
        return false;
    }

    public static function canAccess(): bool
    {
        return false;
    }

    public static function canViewAny(): bool
    {
        return false;
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Donor Information')
                    ->schema([
                        Forms\Components\TextInput::make('donor_name')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('email')
                            ->email()
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('phone')
                            ->tel()
                            ->maxLength(255),
                    ])->columns(3),
                Forms\Components\Section::make('Donation Details')
                    ->schema([
                        Forms\Components\TextInput::make('amount')
                            ->required()
                            ->numeric()
                            ->prefix('₦')
                            ->minValue(100),
                        Forms\Components\Select::make('purpose')
                            ->options([
                                'General Support' => 'General Support',
                                'Coconut Tree Planting' => 'Coconut Tree Planting',
                                'Youth Coconut Entrepreneurship Program' => 'Youth Entrepreneurship Program',
                                'AgunkeFest Sponsorship' => 'AgunkeFest Sponsorship',
                                'Community Development' => 'Community Development',
                                'Environmental Sustainability' => 'Environmental Sustainability',
                            ])
                            ->searchable(),
                        Forms\Components\Select::make('payment_status')
                            ->options([
                                'pending' => 'Pending',
                                'successful' => 'Successful',
                                'failed' => 'Failed',
                            ])
                            ->required()
                            ->default('pending'),
                        Forms\Components\Select::make('currency')
                            ->options([
                                'NGN' => 'NGN (₦)',
                                'USD' => 'USD ($)',
                                'EUR' => 'EUR (€)',
                                'GBP' => 'GBP (£)',
                            ])
                            ->required()
                            ->default('NGN'),
                        Forms\Components\Textarea::make('message')
                            ->columnSpanFull()
                            ->maxLength(1000),
                    ])->columns(2),
                Forms\Components\Section::make('Payment Reference')
                    ->schema([
                        Forms\Components\TextInput::make('payment_reference')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('transaction_id')
                            ->maxLength(255),
                    ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('donor_name')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable()
                    ->toggleable(),
                Tables\Columns\TextColumn::make('amount')
                    ->money('NGN')
                    ->sortable(),
                Tables\Columns\TextColumn::make('purpose')
                    ->searchable()
                    ->toggleable(),
                Tables\Columns\BadgeColumn::make('payment_status')
                    ->colors([
                        'warning' => 'pending',
                        'success' => 'successful',
                        'danger' => 'failed',
                    ]),
                Tables\Columns\TextColumn::make('payment_reference')
                    ->searchable()
                    ->toggleable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime('M d, Y H:i')
                    ->sortable(),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                SelectFilter::make('payment_status')
                    ->options([
                        'pending' => 'Pending',
                        'successful' => 'Successful',
                        'failed' => 'Failed',
                    ]),
                SelectFilter::make('purpose')
                    ->options([
                        'General Support' => 'General Support',
                        'Coconut Tree Planting' => 'Coconut Tree Planting',
                        'Youth Coconut Entrepreneurship Program' => 'Youth Entrepreneurship Program',
                        'AgunkeFest Sponsorship' => 'AgunkeFest Sponsorship',
                        'Community Development' => 'Community Development',
                        'Environmental Sustainability' => 'Environmental Sustainability',
                    ]),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\BulkAction::make('exportCsv')
                        ->label('Export CSV')
                        ->icon('heroicon-o-arrow-down-tray')
                        ->color('success')
                        ->action(function ($records) {
                            $headers = [
                                'Content-Type' => 'text/csv; charset=utf-8',
                                'Content-Disposition' => 'attachment; filename="donations-' . now()->format('Y-m-d') . '.csv"',
                            ];

                            $callback = function () use ($records) {
                                $file = fopen('php://output', 'w');
                                fputs($file, \chr(0xEF) . \chr(0xBB) . \chr(0xBF)); // BOM for Excel UTF-8

                                fputcsv($file, [
                                    'Donor Name', 'Email', 'Phone', 'Amount (NGN)',
                                    'Currency', 'Purpose', 'Payment Status',
                                    'Payment Reference', 'Transaction ID', 'Message', 'Date'
                                ]);

                                foreach ($records as $record) {
                                    fputcsv($file, [
                                        $record->donor_name,
                                        $record->email,
                                        $record->phone,
                                        $record->amount,
                                        $record->currency,
                                        $record->purpose,
                                        $record->payment_status,
                                        $record->payment_reference,
                                        $record->transaction_id,
                                        $record->message,
                                        $record->created_at?->format('M d, Y H:i'),
                                    ]);
                                }

                                fclose($file);
                            };

                            return response()->stream($callback, 200, $headers);
                        })
                        ->visible(fn () => auth()->user()->can('export data')),
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
            'index' => Pages\ListDonations::route('/'),
            'create' => Pages\CreateDonation::route('/create'),
            'edit' => Pages\EditDonation::route('/{record}/edit'),
        ];
    }
}
