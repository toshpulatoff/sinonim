<?php

namespace App\Filament\Resources\WordResource\Pages;

use App\Filament\Resources\WordResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewWord extends ViewRecord
{
    protected static string $resource = WordResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
