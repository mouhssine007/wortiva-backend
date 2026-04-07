<?php

namespace App\Filament\Resources\Stories\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class StoryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')->required(),
                Select::make('level')
                    ->options(['A1'=>'A1','A2'=>'A2','B1'=>'B1','B2'=>'B2','C1'=>'C1','C2'=>'C2'])
                    ->required(),
                Select::make('type')
                    ->options(['learn' => 'Learn (short + grammar)', 'listen' => 'Listen (podcast + audio)'])
                    ->required()
                    ->default('learn'),
                FileUpload::make('cover_image_url')
                    ->disk('public')
                    ->directory('stories/covers')
                    ->image(),
                FileUpload::make('audio_url')
                    ->disk('public')
                    ->directory('stories/audio')
                    ->acceptedFileTypes(['audio/mpeg','audio/mp3','audio/wav']),
                TextInput::make('duration')->default(null),
                TextInput::make('chapter_count')->required()->numeric()->default(0),
                TextInput::make('word_count')->required()->numeric()->default(0),
                Toggle::make('is_premium')->required(),
                Toggle::make('is_published')->required(),
                TextInput::make('sort_order')->required()->numeric()->default(0),

                Repeater::make('paragraphs')
                    ->relationship()
                    ->schema([
                        TextInput::make('sort_order')->numeric()->required()->default(0),
                        Textarea::make('german')
                            ->required()
                            ->rows(2)
                            ->live(debounce: 500)
                            ->afterStateUpdated(function ($state, callable $set) {
                                if (!$state) return;
                                try {
                                    $deepl = new \App\Services\DeeplService();
                                    $set('english', $deepl->translate($state));
                                } catch (\Exception $e) {}
                            }),
                        Textarea::make('english')->required()->rows(2),
                        Toggle::make('is_dialogue')->default(false),
                    ])
                    ->orderColumn('sort_order')
                    ->columnSpanFull()
                    ->addActionLabel('Add Paragraph'),

                Repeater::make('keywords')
                    ->relationship()
                    ->schema([
                        TextInput::make('word')
                            ->required()
                            ->live(debounce: 500)
                            ->afterStateUpdated(function ($state, callable $set) {
                                if (!$state) return;
                                try {
                                    $deepl = new \App\Services\DeeplService();
                                    $set('translation', $deepl->translate($state));
                                } catch (\Exception $e) {}
                            }),
                        TextInput::make('translation')->required(),
                        Select::make('word_type')
                            ->options(['NOUN'=>'Noun','VERB'=>'Verb','ADJECTIVE'=>'Adjective','ADVERB'=>'Adverb'])
                            ->required(),
                        Select::make('level')
                            ->options(['A1'=>'A1','A2'=>'A2','B1'=>'B1','B2'=>'B2','C1'=>'C1','C2'=>'C2'])
                            ->required(),
                    ])
                    ->columnSpanFull()
                    ->addActionLabel('Add Keyword'),

                Repeater::make('grammar')
                    ->relationship()
                    ->schema([
                        TextInput::make('rule_title')->required(),
                        Select::make('level')
                            ->options(['A1'=>'A1','A2'=>'A2','B1'=>'B1','B2'=>'B2','C1'=>'C1','C2'=>'C2'])
                            ->required(),
                        TextInput::make('category')->required(),
                        TextInput::make('example_german')
                            ->required()
                            ->live(debounce: 500)
                            ->afterStateUpdated(function ($state, callable $set) {
                                if (!$state) return;
                                try {
                                    $deepl = new \App\Services\DeeplService();
                                    $set('example_english', $deepl->translate($state));
                                } catch (\Exception $e) {}
                            }),
                        TextInput::make('example_english')->required(),
                        Textarea::make('description')
                            ->required()
                            ->rows(3),
                        Textarea::make('quick_tip')->rows(2),

                        Repeater::make('explanation_blocks')
                            ->schema([
                                TextInput::make('subtitle_en')
                                    ->label('Section title (e.g. Comparative, Superlative)'),
                                Textarea::make('content_en')
                                    ->label('Explanation (English)')
                                    ->rows(3),
                                TextInput::make('example_de')
                                    ->label('Example German'),
                                TextInput::make('example_en')
                                    ->label('Example English')
                                    ->live(debounce: 500)
                                    ->afterStateUpdated(function ($state, $get, callable $set) {
                                        if (!$state) return;
                                        $de = $get('example_de');
                                        if (!$state && $de) {
                                            try {
                                                $deepl = new \App\Services\DeeplService();
                                                $set('example_en', $deepl->translate($de));
                                            } catch (\Exception $e) {}
                                        }
                                    }),
                            ])
                            ->columnSpanFull()
                            ->addActionLabel('Add Explanation Block')
                            ->collapsible(),
                    ])
                    ->maxItems(1)
                    ->columnSpanFull()
                    ->addActionLabel('Add Grammar Rule'),
            ]);
    }
}