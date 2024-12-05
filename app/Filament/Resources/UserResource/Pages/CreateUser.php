<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateUser extends CreateRecord
{
    protected static string $resource = UserResource::class;

    public static function canCreateAnother(): bool
    {
        return false;
    }
    public function getRedirectUrl(): string
    {
        return static::getResource()::getUrl('index');
    }

    public function getCreatedNotificationTitle(): string
    {
        return 'User Created Successfully!!';
    }
}
