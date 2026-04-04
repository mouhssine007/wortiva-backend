<?php

namespace App\Filament\Resources\StoryKeywords\Pages;

use App\Filament\Resources\StoryKeywords\StoryKeywordResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListStoryKeywords extends ListRecords
{
    protected static string $resource = StoryKeywordResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
