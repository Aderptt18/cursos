<?php

namespace App\Filament\Resources\PeriodosAcademicosResource\Pages;

use App\Filament\Resources\PeriodosAcademicosResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPeriodosAcademicos extends ListRecords
{
    protected static string $resource = PeriodosAcademicosResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
