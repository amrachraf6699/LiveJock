<?php

namespace App\Filament\Resources\NewsResource\Pages;

use App\Filament\Resources\NewsResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Resources\Components\Tab;
use Illuminate\Database\Eloquent\Builder;

class ListNews extends ListRecords
{
    protected static string $resource = NewsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    public function getTabs(): array
    {
        return [
            'all' => Tab::make(),
            'Important' => Tab::make()
                ->modifyQueryUsing(fn (Builder $query) => $query->where('is_important', true)),
            'Not Important' => Tab::make()
                ->modifyQueryUsing(fn (Builder $query) => $query->where('is_important', false)),
        ];
    }
}
