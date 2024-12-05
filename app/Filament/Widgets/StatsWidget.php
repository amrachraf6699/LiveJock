<?php

namespace App\Filament\Widgets;

use App\Models\Channel;
use App\Models\News;
use App\Models\Program;
use App\Models\Series;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsWidget extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Users', User::count() - 1)
                ->description('Total number of users')
                ->descriptionIcon('heroicon-o-user'),

            Stat::make('Channels', Channel::count())
            ->description('Total number of channels')
            ->descriptionIcon('heroicon-o-presentation-chart-line'),

            Stat::make('Programs', Program::count())
                ->description('Total number of programs')
                ->descriptionIcon('heroicon-o-tv'),

            Stat::make('Serieses', Series::count())
                ->description('Total number of serieses')
                ->descriptionIcon('heroicon-o-film'),

            Stat::make('News', News::count())
                ->description('Total number of News')
                ->descriptionIcon('heroicon-o-newspaper'),
        ];
    }
}
