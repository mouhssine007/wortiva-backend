<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Story extends Model
{
    protected $fillable = [
        'title', 'level', 'cover_image_url', 'audio_url',
        'duration', 'chapter_count', 'word_count',
        'is_premium', 'is_published', 'sort_order',
    ];

    protected $casts = [
        'is_premium' => 'boolean',
        'is_published' => 'boolean',
    ];

    public function paragraphs(): HasMany
    {
        return $this->hasMany(StoryParagraph::class)->orderBy('sort_order');
    }

    public function keywords(): HasMany
    {
        return $this->hasMany(StoryKeyword::class);
    }

    public function grammar(): HasOne
    {
        return $this->hasOne(StoryGrammar::class);
    }
}