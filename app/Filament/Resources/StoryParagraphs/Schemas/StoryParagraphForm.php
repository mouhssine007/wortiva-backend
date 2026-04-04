<?php

namespace App\Filament\Resources\StoryParagraphs\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class StoryParagraphForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('story_id')
                    ->relationship('story', 'title')
                    ->required(),
                Textarea::make('german')
                    ->required()
                    ->columnSpanFull(),
                Textarea::make('english')
                    ->required()
                    ->columnSpanFull(),
                Toggle::make('is_dialogue')
                    ->required(),
                TextInput::make('sort_order')
                    ->required()
                    ->numeric(),
            ]);
    }
}
