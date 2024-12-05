<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use App\Models\User;
use Filament\Actions\CreateAction;
use Filament\Resources\Components\Tab;
use Illuminate\Database\Eloquent\Builder;

class ListUsers extends ListRecords
{
    protected static string $resource = UserResource::class;

    public function getTabs(): array
    {
        return [
            Tab::make('All')
            ->badge(User::query()->count() - 1)
            ->badgeColor('success')
            ->icon('heroicon-o-user-group'),

            Tab::make('Users')
            ->icon('heroicon-o-users')
            ->badge(User::query()->where('is_admin', false)->count())
            ->badgeColor(User::query()->where('is_admin', false)->count() > 0 ? 'success' : 'danger')
            ->modifyQueryUsing(function (Builder $query) {
                $query->where('is_admin', false);
            }),
            Tab::make('Admins')
                ->badge(User::query()->where('is_admin', true)->count() - 1)
                ->badgeColor(User::query()->where('is_admin', true)->count() > 0 ? 'success' : 'danger')
                ->icon('heroicon-o-check-badge')
                ->modifyQueryUsing(function (Builder $query) {
                    $query->where('is_admin', true);
                })
        ];
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
