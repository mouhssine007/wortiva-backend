<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StoryKeyword extends Model
{
    protected $fillable = [
        'story_id', 'word', 'translation', 'word_type', 'level',
    ];

    public function story(): BelongsTo
    {
        return $this->belongsTo(Story::class);
    }
}