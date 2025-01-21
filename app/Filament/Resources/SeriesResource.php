<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SeriesResource\Pages;
use App\Filament\Resources\SeriesResource\RelationManagers;
use App\Models\Series;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SeriesResource extends Resource
{
    protected static ?string $model = Series::class;

    protected static ?string $navigationIcon = 'heroicon-o-video-camera';

    protected static ?string $activeNavigationIcon = 'heroicon-o-chevron-double-right';

    public static function getNavigationLabel(): string
    {
        return app()->getLocale() === 'en' ? 'Serieses' : 'المسلسلات';
    }

    public static function getpluralLabel(): string
    {
        return app()->getLocale() === 'en' ? 'Serieses' : 'المسلسلات';
    }

    public static function getPluralModelLabel(): string
    {
        return app()->getLocale() === 'en' ? 'Serieses' : 'المسلسلات';
    }

    public static function getModelLabel(): string
    {
        return app()->getLocale() === 'en' ? 'Series' : 'مسلسل';
    }

    public static function getNavigationGroup(): string
    {
        return app()->getLocale() === 'en' ? 'Media Section' : 'القسم الإعلامي';
    }


    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }
    public static function getNavigationBadgeColor(): ?string
    {
        return static::getModel()::count() > 0 ? 'success' : 'danger';
    }


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Card::make()
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->label('Name')
                            ->required()
                            ->unique(ignoreRecord: true)
                            ->maxLength(255),
                        Forms\Components\FileUpload::make('cover')
                            ->acceptedFileTypes(['image/*'])
                            ->required()
                            ->disk('public_storage')
                            ->directory('images/Serieses')
                            ->image()
                            ->label('Cover'),
                    ])
                    ->columns(1),

                Forms\Components\Card::make()
                    ->schema([
                        Forms\Components\Select::make('categories')
                            ->label('Categories')
                            ->relationship('categories', 'name')
                            ->multiple()
                            ->preload()
                            ->searchable(),
                    ])
                    ->columns(1)
                    ->label('Manage Categories'),

                Forms\Components\Card::make()
                    ->schema([
                        Forms\Components\Repeater::make('episodes')
                        ->relationship('episodes')
                        ->schema([
                            Forms\Components\TextInput::make('title')
                                ->label('Episode Title')
                                ->required()
                                ->columnSpan('full'),

                            Forms\Components\Section::make('Media')
                                ->schema([
                                    Forms\Components\FileUpload::make('cover')
                                        ->acceptedFileTypes(['image/*'])
                                        ->disk('public_storage')
                                        ->directory('images/seireses')
                                        ->image()
                                        ->label('Episode Cover'),

                                    Forms\Components\FileUpload::make('video_url')
                                    ->label('Video')
                                        ->acceptedFileTypes(['video/*'])
                                        ->disk('public_storage')
                                        ->directory('videos/episodes')
                                        ->visibility('public')
                                        ->fetchFileInformation(false)
                                        ->required()
                                        ->label('Video File'),
                                ])
                                ->columns(2)
                                ->collapsible()
                                ->collapsed(),
                        ])
                        ->createItemButtonLabel('Add Episode')
                        ->columns(1),
                    ])
                    ->columns(1)
                    ->label('Manage Episode'),
            ]);
    }


    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('cover_url')
                    ->circular()
                    ->label(''),
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),

                Tables\Columns\BadgeColumn::make('categories.name')
                    ->label('Categories')
                    ->getStateUsing(function ($record) {
                        return $record->categories->isEmpty() ? 'N/A' : $record->categories->map(function ($category) {
                            return $category->name;
                        });
                    })
                    ->color(function ($record) {
                        return $record->categories->isEmpty() ? 'danger' : 'success';
                    })
                    ->sortable()
                    ->searchable(),

                Tables\Columns\BadgeColumn::make('episodes_count')
                    ->counts('episodes')
                    ->color(function ($state) {
                        return $state === 0 ? 'danger' : 'success';
                    }),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
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
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSeries::route('/'),
            'create' => Pages\CreateSeries::route('/create'),
            'edit' => Pages\EditSeries::route('/{record}/edit'),
        ];
    }
}
