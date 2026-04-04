<?php

namespace App\Filament\Resources\StoryKeywords\Pages;

use App\Filament\Resources\StoryKeywords\StoryKeywordResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditStoryKeyword extends EditRecord
{
    protected static string $resource = StoryKeywordResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
