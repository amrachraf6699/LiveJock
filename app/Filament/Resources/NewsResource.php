<?php

namespace App\Filament\Resources;

use App\Filament\Resources\NewsResource\Pages;
use App\Filament\Resources\NewsResource\RelationManagers;
use App\Models\News;
use Filament\Facades\Filament;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\BooleanColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Tabs\Tab;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\DatePicker;
use Filament\Tables\Filters\Filter;

class NewsResource extends Resource
{
    protected static ?string $model = News::class;
    protected static ?string $navigationIcon = 'heroicon-o-newspaper';



    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Card::make()
                ->label('Title & Cover')
                    ->schema([
                        FileUpload::make('cover')
                            ->image()
                            ->acceptedFileTypes(['image/*'])
                            ->required()
                            ->disk('public_storage')
                            ->directory('images/news/covers')
                            ->label('Cover'),

                        Forms\Components\TextInput::make('title')
                            ->required()
                            ->maxLength(255)
                            ->label('Title'),
                    ])
                    ->columnSpanFull(),

                RichEditor::make('content')
                    ->required()
                    ->maxLength(65535)
                    ->label('Content')
                    ->fileAttachmentsDisk('public_storage')
                    ->fileAttachmentsDirectory('images/news/attachments')
                    ->columnSpanFull(),

                Forms\Components\Toggle::make('is_important')
                    ->label('Is Important?')
                    ->required()
                    ->columnSpanFull(),
            ]);
    }


    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                ImageColumn::make('cover_url')
                    ->height('45px')
                    ->label(''),
                TextColumn::make('title')
                    ->searchable(),
                ToggleColumn::make('is_important')
                    ->label('Important'),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                Filter::make('created_at')
                ->form([
                    DatePicker::make('created_from'),
                    DatePicker::make('created_until'),
                ])
                ->query(function (Builder $query, array $data): Builder {
                    return $query
                        ->when(
                            $data['created_from'],
                            fn (Builder $query, $date): Builder => $query->whereDate('created_at', '>=', $date),
                        )
                        ->when(
                            $data['created_until'],
                            fn (Builder $query, $date): Builder => $query->whereDate('created_at', '<=', $date),
                        );
                })
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListNews::route('/'),
            'create' => Pages\CreateNews::route('/create'),
            'edit' => Pages\EditNews::route('/{record}/edit'),
        ];
    }
}
