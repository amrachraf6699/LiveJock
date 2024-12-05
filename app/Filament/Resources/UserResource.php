<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Card::make([
                    Forms\Components\TextInput::make('name')
                        ->label('Full Name')
                        ->required()
                        ->placeholder('Enter your full name')
                        ->maxLength(255),

                    Forms\Components\TextInput::make('email')
                        ->label('Email Address')
                        ->email()
                        ->unique()
                        ->required()
                        ->placeholder('Enter a valid email address')
                        ->maxLength(255),

                    Forms\Components\DateTimePicker::make('email_verified_at')
                        ->label('Email Verified At')
                        ->placeholder('Select verification date (optional)'),
                ])
                ->label('User Information'),

                Forms\Components\Card::make([
                    Forms\Components\TextInput::make('password')
                        ->label('Password')
                        ->required()
                        ->placeholder('Create a strong password')
                        ->maxLength(255),

                    Forms\Components\TextInput::make('phone')
                        ->label('Phone Number')
                        ->tel()
                        ->unique()
                        ->required()
                        ->placeholder('Enter your phone number')
                        ->maxLength(255),
                ])
                ->label('Credentials'),

                Forms\Components\Card::make([
                    Forms\Components\Toggle::make('is_admin')
                        ->label('Administrator Access')
                        ->helperText('Enable this toggle if the user is an administrator.')
                        ->required(),
                ])
                ->label('Permissions'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->query(fn (User $query) => $query->where('id', '!=', auth()->id()))
            ->columns([
                Tables\Columns\ToggleColumn::make('is_admin'),
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('phone')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->label('Joined At')
                    ->sortable(),

                Tables\Columns\TextColumn::make('email_verified_at')
                    ->getStateUsing(fn ($record) => $record->email_verified_at
                        ? $record->email_verified_at->format('Y-m-d H:i:s') . ' ( ' . $record->email_verified_at->diffForHumans() . ' )'
                        : 'Not Verified Yet')
                    ->badge(fn ($record) => $record->email_verified_at
                        ? false
                        : true)
                        ->color(fn ($record) => $record->email_verified_at
                            ?
                            : 'danger')
                    ->sortable(),

                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->label('Last Update At')
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
