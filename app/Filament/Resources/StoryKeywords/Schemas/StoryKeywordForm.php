<?php

namespace App\Filament\Resources\StoryKeywords\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class StoryKeywordForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('story_id')
                    ->relationship('story', 'title')
                    ->required(),
                TextInput::make('word')
                    ->required(),
                TextInput::make('translation')
                    ->required(),
                TextInput::make('word_type')
                    ->required(),
                TextInput::make('level')
                    ->required(),
            ]);
    }
}
