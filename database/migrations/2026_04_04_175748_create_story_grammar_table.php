<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('story_grammar', function (Blueprint $table) {
            $table->id();
            $table->foreignId('story_id')->constrained()->cascadeOnDelete();
            $table->string('rule_title');
            $table->string('level', 10);
            $table->string('category', 100);
            $table->string('example_german');
            $table->string('example_english');
            $table->json('highlighted_words');
            $table->text('description');
            $table->json('table_rows');
            $table->text('quick_tip')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('story_grammar');
    }
};