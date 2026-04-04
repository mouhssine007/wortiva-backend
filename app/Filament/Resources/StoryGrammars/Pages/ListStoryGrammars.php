<?php

namespace App\Filament\Resources\StoryGrammars\Pages;

use App\Filament\Resources\StoryGrammars\StoryGrammarResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListStoryGrammars extends ListRecords
{
    protected static string $resource = StoryGrammarResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
