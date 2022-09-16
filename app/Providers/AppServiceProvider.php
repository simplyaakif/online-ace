<?php

namespace App\Providers;

use Filament\Facades\Filament;
use Filament\Navigation\NavigationItem;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Vite;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Model::unguard();
        Filament::serving(function (){
            Filament::registerTheme(
                app(Vite::class)('resources/css/filament.css'),
            );
            Filament::registerNavigationItems([
                                                  NavigationItem::make('Generate Invoice')
                                                      ->url('https://filament.pirsch.io', shouldOpenInNewTab: true)
                                                      ->icon('heroicon-o-presentation-chart-line')
                                                      ->group('Finance Management')
                                                      ->sort(3),
                                              ]);
        });
        Filament::registerNavigationGroups([
                                               'Dashboard',
                                               'Query Management',
                                               'Admission Management',
                                               'Academics Management',
                                               'Finance Management',
                                               'Employee Management',
                                               'User Management',

                                           ]);
    }
}
