<?php

namespace App\Providers;

use Filament\Facades\Filament;
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
        });
        Filament::registerNavigationGroups([
                                               'Dashboard',
                                               'Admission Management',
                                               'Academics Management',
                                               'Finance Management',
                                               'Employee Management',
                                               'User Management',

                                           ]);
    }
}
