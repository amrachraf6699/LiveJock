<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AdResource\Pages;
use App\Filament\Resources\AdResource\RelationManagers;
use App\Models\Ad;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Illuminate\Support\HtmlString;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AdResource extends Resource
{
    protected static ?string $model = Ad::class;

    protected static ?string $navigationIcon = 'heroicon-o-fire';



    public static function getNavigationLabel(): string
    {
        return app()->getLocale() === 'en' ? 'Ads' : 'الإعلانات';
    }

    public static function getpluralLabel(): string
    {
        return app()->getLocale() === 'en' ? 'Ads' : 'الإعلانات';
    }

    public static function getPluralModelLabel(): string
    {
        return app()->getLocale() === 'en' ? 'Ads' : 'الإعلانات';
    }

    public static function getModelLabel(): string
    {
        return app()->getLocale() === 'en' ? 'Ad' : 'إعلان';
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
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->label()
                    ->maxLength(255)
                    ->placeholder('Enter the title')
                    ->label('Title'),

                Forms\Components\FileUpload::make('cover')
                    ->required()
                    ->acceptedFileTypes(['image/*'])
                    ->maxSize(4096)
                    ->disk('public_storage')
                    ->directory('images/ads')
                    ->image()
                    ->label('Cover Image')
                    ->helperText('Upload a high-quality cover image'),

                Forms\Components\TextInput::make('url')
                    ->required()
                    ->maxLength(255)
                    ->url()
                    ->placeholder('Enter the URL')
                    ->label('URL')
                    ->helperText('Provide a valid URL for the item')
            ])
            ->columns(1);
    }



    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('cover_url')
                    ->label('')
                    ->circular(),

                Tables\Columns\TextColumn::make('title')
                    ->searchable()
                    ->label('Title'),

                    Tables\Columns\TextColumn::make('url')
                    ->searchable()
                    ->alignLeft()
                    ->label('URL'),

                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->label('Created At'),

                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->label('Updated At'),
            ])
            ->filters([
            ])
            ->actions([
                Tables\Actions\LinkAction::make('View AD URL')
                    ->label('Visit AD')
                    ->color('success')
                    ->url(fn ($record) => $record->url)
                    ->openUrlInNewTab()
                    ->icon('heroicon-o-link'),
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
            'index' => Pages\ListAds::route('/'),
            'create' => Pages\CreateAd::route('/create'),
            'edit' => Pages\EditAd::route('/{record}/edit'),
        ];
    }
}
