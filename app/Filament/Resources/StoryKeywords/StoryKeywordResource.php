<?php

namespace App\Filament\Resources\StoryKeywords;

use App\Filament\Resources\StoryKeywords\Pages\CreateStoryKeyword;
use App\Filament\Resources\StoryKeywords\Pages\EditStoryKeyword;
use App\Filament\Resources\StoryKeywords\Pages\ListStoryKeywords;
use App\Filament\Resources\StoryKeywords\Schemas\StoryKeywordForm;
use App\Filament\Resources\StoryKeywords\Tables\StoryKeywordsTable;
use App\Models\StoryKeyword;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class StoryKeywordResource extends Resource
{
    protected static ?string $model = StoryKeyword::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'admin';

    public static function form(Schema $schema): Schema
    {
        return StoryKeywordForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return StoryKeywordsTable::configure($table);
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
            'index' => ListStoryKeywords::route('/'),
            'create' => CreateStoryKeyword::route('/create'),
            'edit' => EditStoryKeyword::route('/{record}/edit'),
        ];
    }
}
