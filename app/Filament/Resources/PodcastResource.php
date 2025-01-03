<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PodcastResource\Pages;
use App\Filament\Resources\PodcastResource\RelationManagers;
use App\Models\Podcast;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PodcastResource extends Resource
{
    protected static ?string $model = Podcast::class;

    protected static ?string $navigationIcon = 'heroicon-o-microphone';
    protected static ?string $activeNavigationIcon = 'heroicon-o-chevron-double-right';


    public static function getNavigationLabel(): string
    {
        return app()->getLocale() === 'en' ? 'Podcasts' : 'البودكاست';
    }

    public static function getpluralLabel(): string
    {
        return app()->getLocale() === 'en' ? 'Podcasts' : 'البودكاست';
    }

    public static function getPluralModelLabel(): string
    {
        return app()->getLocale() === 'en' ? 'Podcasts' : 'البودكاست';
    }

    public static function getModelLabel(): string
    {
        return app()->getLocale() === 'en' ? 'Podcast' : 'بودكاست';
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
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255)
                    ->columnSpanFull(),

                Forms\Components\FileUpload::make('cover')
                    ->acceptedFileTypes(['image/*'])
                    ->disk('public_storage')
                    ->directory('images/podcasts')
                    ->image()
                    ->label('Podcast Cover')
                    ->required()
                    ->columnSpanFull(),

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
                                        ->required()
                                        ->directory('images/episodes')
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
                    ->label('')
                    ->toggleable(),
                Tables\Columns\TextColumn::make('name')
                    ->label('Podcast Name')
                    ->searchable(),
                    Tables\Columns\BadgeColumn::make('episodes_count')
                    ->counts('episodes')
                    ->sortable()
                    ->color(function ($state) {
                        return $state === 0 ? 'danger' : 'success';
                    }),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([

            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
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
            // Add relations if any
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPodcasts::route('/'),
            'create' => Pages\CreatePodcast::route('/create'),
            'edit' => Pages\EditPodcast::route('/{record}/edit'),
        ];
    }
}
