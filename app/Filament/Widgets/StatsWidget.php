<?php

namespace App\Filament\Widgets;

use App\Models\Ad;
use App\Models\Channel;
use App\Models\Child;
use App\Models\Film;
use App\Models\News;
use App\Models\Podcast;
use App\Models\Program;
use App\Models\Series;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsWidget extends BaseWidget
{
    protected function getStats(): array
    {
        $locale = app()->getLocale();

        return [
            Stat::make(
                $locale === 'en' ? 'Users' : 'المستخدمون',
                User::count() - 1
            )
                ->description($locale === 'en' ? 'Total number of users' : 'إجمالي عدد المستخدمين')
                ->descriptionIcon('heroicon-o-user'),

            Stat::make(
                $locale === 'en' ? 'Channels' : 'القنوات',
                Channel::count()
            )
                ->description($locale === 'en' ? 'Total number of channels' : 'إجمالي عدد القنوات')
                ->descriptionIcon('heroicon-o-presentation-chart-line'),

            Stat::make(
                $locale === 'en' ? 'Programs' : 'البرامج',
                Program::count()
            )
                ->description($locale === 'en' ? 'Total number of programs' : 'إجمالي عدد البرامج')
                ->descriptionIcon('heroicon-o-tv'),

            Stat::make(
                $locale === 'en' ? 'Series' : 'المسلسلات',
                Series::count()
            )
                ->description($locale === 'en' ? 'Total number of series' : 'إجمالي عدد المسلسلات')
                ->descriptionIcon('heroicon-o-film'),

            Stat::make(
                $locale === 'en' ? 'News' : 'الأخبار',
                News::count()
            )
                ->description($locale === 'en' ? 'Total number of news' : 'إجمالي عدد الأخبار')
                ->descriptionIcon('heroicon-o-newspaper'),

            Stat::make(
                $locale === 'en' ? 'Ads' : 'الإعلانات',
                Ad::count()
            )
                ->description($locale === 'en' ? 'Total number of ads' : 'إجمالي عدد الإعلانات')
                ->descriptionIcon('heroicon-o-fire'),

            Stat::make(
                $locale === 'en' ? 'Children Shows' : 'عروض الأطفال',
                Child::count()
            )
                ->description($locale === 'en' ? 'Total number of children shows' : 'إجمالي عدد عروض الأطفال')
                ->descriptionIcon('heroicon-o-face-smile'),

            Stat::make(
                $locale === 'en' ? 'Films' : 'الأفلام',
                Film::count()
            )
                ->description($locale === 'en' ? 'Total number of films' : 'إجمالي عدد الأفلام')
                ->descriptionIcon('heroicon-o-film'),

            Stat::make(
                $locale === 'en' ? 'Podcasts' : 'البودكاست',
                Podcast::count()
            )
                ->description($locale === 'en' ? 'Total number of podcasts' : 'إجمالي عدد البودكاست')
                ->descriptionIcon('heroicon-o-microphone'),
        ];
    }
}
