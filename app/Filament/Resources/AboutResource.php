<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AboutResource\Pages;
use App\Filament\Resources\AboutResource\RelationManagers;
use App\Models\About;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AboutResource extends Resource
{
    protected static ?string $model = About::class;

    protected static ?string $navigationIcon = 'heroicon-o-cog';

    protected static ?string $activeNavigationIcon = 'heroicon-o-chevron-double-right';


    public static function getNavigationLabel(): string
    {
        return app()->getLocale() === 'en' ? 'Website Settings' : 'إعدادات الموقع';
    }

    public static function getpluralLabel(): string
    {
        return app()->getLocale() === 'en' ? 'Website Settings' : 'إعدادات الموقع';
    }

    public static function getPluralModelLabel(): string
    {
        return app()->getLocale() === 'en' ? 'Website Settings' : 'إعدادات الموقع';
    }

    public static function getModelLabel(): string
    {
        return app()->getLocale() === 'en' ? 'Website Setting' : 'إعدادات الموقع';
    }


    public static function canCreate(): bool
    {
        return About::count() > 0 ? false : true;
    }


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Group::make([
                    Forms\Components\FileUpload::make('logo')
                        ->acceptedFileTypes(['image/*'])
                        ->required()
                        ->disk('public_storage')
                        ->directory('images')
                        ->image()
                        ->panelLayout('integrated')
                        ->label('Channel Logo'),
                ])
                ->columnSpanFull()
                ->extraAttributes(['class' => 'flex justify-center']),

                Forms\Components\Section::make('Contact Information')
                    ->schema([
                        Forms\Components\TextInput::make('email')
                            ->email()
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('phone')
                            ->tel()
                            ->required()
                            ->maxLength(255),
                    ])
                    ->collapsible()
                    ->collapsed(),

                Forms\Components\Section::make('Social Media Links')
                    ->schema([
                        Forms\Components\TextInput::make('facebook')
                            ->required()
                            ->url()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('twitter')
                            ->required()
                            ->url()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('instagram')
                            ->required()
                            ->url()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('youtube')
                            ->required()
                            ->url()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('snapchat')
                            ->required()
                            ->url()
                            ->maxLength(255),
                    ])
                    ->collapsible()
                    ->collapsed(),

                Forms\Components\Section::make('Channel Information')
                    ->schema([
                        Forms\Components\TextInput::make('channel_frequency')
                            ->required()
                            ->maxLength(255),
                    ])
                    ->collapsible()
                    ->collapsed(),

                Forms\Components\Section::make('Website Information')
                    ->schema([
                        Forms\Components\TextInput::make('website')
                            ->required()
                            ->maxLength(255),
                    ])
                    ->collapsible()
                    ->collapsed(),
            ]);
    }



    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('logo_url')
                    ->label('')
                    ->height('50px')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('phone')
                    ->searchable(),
                Tables\Columns\TextColumn::make('mail')
                    ->searchable(),
                Tables\Columns\TextColumn::make('facebook')
                    ->searchable(),
                Tables\Columns\TextColumn::make('twitter')
                    ->searchable(),
                Tables\Columns\TextColumn::make('website')
                    ->searchable(),
                Tables\Columns\TextColumn::make('youtube')
                    ->searchable(),
                Tables\Columns\TextColumn::make('channel_frequency')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('instagram')
                    ->searchable(),
                Tables\Columns\TextColumn::make('snapchat')
                    ->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListAbouts::route('/'),
            'create' => Pages\CreateAbout::route('/create'),
            // 'edit' => Pages\EditAbout::route('/{record}/edit'),
        ];
    }
}
