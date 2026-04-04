<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('story_keywords', function (Blueprint $table) {
            $table->id();
            $table->foreignId('story_id')->constrained()->cascadeOnDelete();
            $table->string('word');
            $table->string('translation');
            $table->string('word_type', 50);
            $table->string('level', 10);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('story_keywords');
    }
};