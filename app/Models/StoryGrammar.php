<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StoryGrammar extends Model
{
    protected $table = 'story_grammar';

    protected $fillable = [
        'story_id', 'rule_title', 'level', 'category',
        'example_german', 'example_english', 'highlighted_words',
        'description', 'table_rows', 'quick_tip', 'explanation_blocks',
    ];

    protected $casts = [
        'highlighted_words' => 'array',
        'table_rows' => 'array',
        'explanation_blocks' => 'array',
    ];

    protected $attributes = [
        'highlighted_words' => '[]',
        'table_rows' => '[]',
        'explanation_blocks' => '[]',
    ];

    public function story(): BelongsTo
    {
        return $this->belongsTo(Story::class);
    }
}