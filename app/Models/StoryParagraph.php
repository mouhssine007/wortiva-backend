<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StoryParagraph extends Model
{
    protected $fillable = [
        'story_id', 'german', 'english', 'is_dialogue', 'sort_order',
    ];

    protected $casts = [
        'is_dialogue' => 'boolean',
    ];

    public function story(): BelongsTo
    {
        return $this->belongsTo(Story::class);
    }
}