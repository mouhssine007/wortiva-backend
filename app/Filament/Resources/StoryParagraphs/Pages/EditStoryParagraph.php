<?php

namespace App\Filament\Resources\StoryParagraphs\Pages;

use App\Filament\Resources\StoryParagraphs\StoryParagraphResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditStoryParagraph extends EditRecord
{
    protected static string $resource = StoryParagraphResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
