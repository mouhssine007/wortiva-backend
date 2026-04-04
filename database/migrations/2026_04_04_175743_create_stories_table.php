<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('stories', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('level', 10);
            $table->string('cover_image_url')->nullable();
            $table->string('audio_url')->nullable();
            $table->string('duration', 50)->nullable();
            $table->integer('chapter_count')->default(0);
            $table->integer('word_count')->default(0);
            $table->boolean('is_premium')->default(false);
            $table->boolean('is_published')->default(true);
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('stories');
    }
};