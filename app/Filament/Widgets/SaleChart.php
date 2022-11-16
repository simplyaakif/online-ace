<?php

namespace App\Filament\Widgets;

use App\Models\Recovery;
use Filament\Widgets\LineChartWidget;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;

class SaleChart extends LineChartWidget
{
    protected static ?string $heading = 'Chart';
    protected static ?int $sort = 7;

    public ?string $filter = 'week';

//    protected function getFilters(): ?array
//    {
//        return [
//            'today' => 'Today',
//            'week' => 'Last week',
//            'month' => 'Last month',
//            'year' => 'This year',
//        ];
//    }

    protected function getData(): array
    {

        $activeFilter = $this->filter;

        $data = Trend::query(Recovery::where('is_paid','=',1))
            ->between(
                start: now()->startOfMonth(),
                end: now()->endOfMonth(),
            )
            ->dateColumn('paid_on')
            ->perDay()
            ->sum('amount');

        return [
            'datasets' => [
                [
                    'label' => 'Monthly Sale',
                    'data' => $data->map(fn (TrendValue $value) => $value->aggregate),
                ],
            ],
            'labels' => $data->map(fn (TrendValue $value) => $value->date),
        ];
    }
}
