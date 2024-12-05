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

    protected static ?string $navigationIcon = 'heroicon-o-film';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Card::make()
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->label('Name')
                            ->required()
                            ->unique()
                            ->maxLength(255),
                    ])
                    ->columns(1),
                Forms\Components\Card::make()
                    ->schema([
                        Forms\Components\FileUpload::make('cover')
                            ->acceptedFileTypes(['image/*'])
                            ->required()
                            ->disk('public_storage')
                            ->directory('images/serieses')
                            ->image()
                            ->label('Cover'),
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
