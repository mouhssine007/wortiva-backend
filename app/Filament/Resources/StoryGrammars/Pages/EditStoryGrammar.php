<?php

namespace App\Filament\Resources\StoryGrammars\Pages;

use App\Filament\Resources\StoryGrammars\StoryGrammarResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditStoryGrammar extends EditRecord
{
    protected static string $resource = StoryGrammarResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
