<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FilmResource\Pages;
use App\Filament\Resources\FilmResource\RelationManagers;
use App\Models\Film;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class FilmResource extends Resource
{
    protected static ?string $model = Film::class;

    protected static ?string $navigationIcon = 'heroicon-o-film';

    protected static ?string $activeNavigationIcon = 'heroicon-o-chevron-double-right';


    public static function getNavigationLabel(): string
    {
        return app()->getLocale() === 'en' ? 'Films' : 'الأفلام';
    }

    public static function getpluralLabel(): string
    {
        return app()->getLocale() === 'en' ? 'Films' : 'الأفلام';
    }

    public static function getPluralModelLabel(): string
    {
        return app()->getLocale() === 'en' ? 'Films' : 'الأفلام';
    }

    public static function getModelLabel(): string
    {
        return app()->getLocale() === 'en' ? 'Film' : 'فيلم';
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
                    ->label('Film Name')
                    ->columnSpanFull(),

                Forms\Components\FileUpload::make('cover')
                    ->acceptedFileTypes(['image/*'])
                    ->disk('public_storage')
                    ->directory('images/films')
                    ->image()
                    ->label('Film Cover')
                    ->required()
                    ->columnSpanFull(),

                Forms\Components\Fieldset::make('Media of Film')
                    ->relationship('file')
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->label('Episode Title')
                            ->required(),

                        Forms\Components\FileUpload::make('cover')
                            ->acceptedFileTypes(['image/*'])
                            ->disk('public_storage')
                            ->required()
                            ->directory('images/episodes')
                            ->image()
                            ->label('Episode Cover')
                            ->required(),

                        Forms\Components\FileUpload::make('video_url')
                            ->acceptedFileTypes(['video/*'])
                            ->disk('public_storage')
                            ->directory('videos/episodes')
                            ->visibility('public')
                            ->fetchFileInformation(false)
                            ->required()
                            ->label('Video File'),

                    ])
                    ->columns(1),
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
                    ->label('Film Name')
                    ->searchable(),

                Tables\Columns\TextColumn::make('file.title')
                    ->label('Episode Title')
                    ->searchable()
                    ->toggleable(),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Created At')
                    ->dateTime()
                    ->sortable(),

                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Updated At')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                // Add any filters if required
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
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListFilms::route('/'),
            'create' => Pages\CreateFilm::route('/create'),
            // 'edit' => Pages\EditFilm::route('/{record}/edit'),
        ];
    }
}
