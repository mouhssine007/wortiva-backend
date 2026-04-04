<?php

namespace App\Filament\Resources\StoryParagraphs\Pages;

use App\Filament\Resources\StoryParagraphs\StoryParagraphResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListStoryParagraphs extends ListRecords
{
    protected static string $resource = StoryParagraphResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
