<?php

namespace App\Filament\Resources\PeriodosAcademicosResource\Pages;

use App\Filament\Resources\PeriodosAcademicosResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPeriodosAcademicos extends EditRecord
{
    protected static string $resource = PeriodosAcademicosResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
