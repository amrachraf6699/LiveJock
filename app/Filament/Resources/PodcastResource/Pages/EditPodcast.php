<?php

namespace App\Filament\Resources\PodcastResource\Pages;

use App\Filament\Resources\PodcastResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPodcast extends EditRecord
{
    protected static string $resource = PodcastResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    public function getRedirectUrl(): string
    {
        return static::getResource()::getUrl('index');
    }
}
