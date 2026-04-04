<?php

namespace App\Filament\Resources\StoryGrammars;

use App\Filament\Resources\StoryGrammars\Pages\CreateStoryGrammar;
use App\Filament\Resources\StoryGrammars\Pages\EditStoryGrammar;
use App\Filament\Resources\StoryGrammars\Pages\ListStoryGrammars;
use App\Filament\Resources\StoryGrammars\Schemas\StoryGrammarForm;
use App\Filament\Resources\StoryGrammars\Tables\StoryGrammarsTable;
use App\Models\StoryGrammar;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class StoryGrammarResource extends Resource
{
    protected static ?string $model = StoryGrammar::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'admin';

    public static function form(Schema $schema): Schema
    {
        return StoryGrammarForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return StoryGrammarsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListStoryGrammars::route('/'),
            'create' => CreateStoryGrammar::route('/create'),
            'edit' => EditStoryGrammar::route('/{record}/edit'),
        ];
    }
}
