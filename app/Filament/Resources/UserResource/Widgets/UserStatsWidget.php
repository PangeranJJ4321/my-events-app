<?php

namespace App\Filament\Resources\UserResource\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\User;

class UserStatsWidget extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Admin Users', User::where('role', 'admin')->count())
                ->description('Total number of Admin users.')
                ->descriptionIcon('heroicon-o-user-group')
                ->color('warning'),
            
            Stat::make('Attendant Users', User::where('role', 'attendant')->count())
                ->description('Total number of Attendant users.')
                ->descriptionIcon('heroicon-o-user')
                ->color('success'),
            
            Stat::make('Organizer Users', User::where('role', 'organizer')->count())
                ->description('Total number of Organizer users.')
                ->descriptionIcon('heroicon-o-users')
                ->color('info'),
        ];
    }
}
