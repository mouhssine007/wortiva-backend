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
        'description', 'table_rows', 'quick_tip',
    ];

    protected $casts = [
        'highlighted_words' => 'array',
        'table_rows' => 'array',
    ];

    protected $attributes = [
        'highlighted_words' => '[]',
        'table_rows' => '[]',
    ];

    public function story(): BelongsTo
    {
        return $this->belongsTo(Story::class);
    }
}