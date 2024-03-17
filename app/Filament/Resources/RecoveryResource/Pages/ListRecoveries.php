<?php

namespace App\Filament\Resources\RecoveryResource\Pages;

use App\Filament\Resources\RecoveryResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Contracts\View\View;

class ListRecoveries extends ListRecords
{
    protected static string $resource = RecoveryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
    protected function getTableContentFooter(): ?View
    {
        return view('admin.filament.recovery.index-footer');
    }
}
