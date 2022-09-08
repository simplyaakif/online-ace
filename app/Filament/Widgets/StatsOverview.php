<?php

    namespace App\Filament\Widgets;

    use App\Models\BatchStudent;
    use App\Models\Recovery;
    use Filament\Widgets\StatsOverviewWidget as BaseWidget;
    use Filament\Widgets\StatsOverviewWidget\Card;

    class StatsOverview extends BaseWidget {

        protected function getCards(): array
        {
            return [
                Card::make('Daily Admission', BatchStudent::whereDate('created_at', now()->toDate())->count()),
                Card::make('Month\'s Admission', BatchStudent::whereBetween('created_at', [
                    now()->startOfMonth()->toDate(),
                    now()->endOfMonth()->toDate(),
                ])->count()),
                Card::make('Last Month\'s Admission', BatchStudent::whereBetween('created_at', [
                    now()->subMonth()->startOfMonth()->toDate(),
                    now()->subMonth()->endOfMonth()->toDate(),
                ])->count()),

                Card::make('Daily Sale', Recovery::whereDate('paid_on', now()->toDate())->sum('amount')),
                Card::make('Month\'s Sale', Recovery::whereBetween('paid_on', [
                    now()->startOfMonth()->toDate(),
                    now()->endOfMonth()->toDate(),
                ])->sum('amount')),
                Card::make('Last Month\'s Sale', Recovery::whereBetween('paid_on', [
                    now()->subMonth()->startOfMonth()->toDate(),
                    now()->subMonth()->endOfMonth()->toDate(),
                ])->sum('amount')),


                //
            ];
        }
    }
