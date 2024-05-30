<?php

namespace App\Filament\Resources\KosanResource\Pages;

use App\Filament\Resources\KosanResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;
use Illuminate\Contracts\Support\Htmlable;

class ManageKosans extends ManageRecords
{
    protected static string $resource = KosanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
    public function getTitle(): string
    {
        return 'Kosan';
    }
}
