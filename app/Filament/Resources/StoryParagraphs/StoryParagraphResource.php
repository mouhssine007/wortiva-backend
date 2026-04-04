<?php

namespace App\Filament\Resources\StoryParagraphs;

use App\Filament\Resources\StoryParagraphs\Pages\CreateStoryParagraph;
use App\Filament\Resources\StoryParagraphs\Pages\EditStoryParagraph;
use App\Filament\Resources\StoryParagraphs\Pages\ListStoryParagraphs;
use App\Filament\Resources\StoryParagraphs\Schemas\StoryParagraphForm;
use App\Filament\Resources\StoryParagraphs\Tables\StoryParagraphsTable;
use App\Models\StoryParagraph;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class StoryParagraphResource extends Resource
{
    protected static ?string $model = StoryParagraph::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'admin';

    public static function form(Schema $schema): Schema
    {
        return StoryParagraphForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return StoryParagraphsTable::configure($table);
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
            'index' => ListStoryParagraphs::route('/'),
            'create' => CreateStoryParagraph::route('/create'),
            'edit' => EditStoryParagraph::route('/{record}/edit'),
        ];
    }
}
