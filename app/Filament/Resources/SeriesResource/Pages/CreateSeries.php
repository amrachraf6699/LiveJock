<?php

namespace App\Filament\Resources\SeriesResource\Pages;

use App\Filament\Resources\SeriesResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateSeries extends CreateRecord
{
    protected static string $resource = SeriesResource::class;

    public static function canCreateAnother(): bool
    {
        return false;
    }
    public function getRedirectUrl(): string
    {
        return static::getResource()::getUrl('index');
    }
}
