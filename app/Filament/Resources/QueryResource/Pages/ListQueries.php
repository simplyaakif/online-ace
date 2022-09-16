<?php

    namespace App\Filament\Resources\QueryResource\Pages;

    use App\Filament\Resources\QueryResource;
    use Filament\Pages\Actions\CreateAction;
    use Filament\Resources\Pages\ListRecords;

    class ListQueries extends ListRecords {

        protected static string $resource = QueryResource::class;

        protected function getActions(): array
        {
            return [
                CreateAction::make(),
            ];
        }
    }
