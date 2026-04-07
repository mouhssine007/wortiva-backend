<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('story_grammar', function (Blueprint $table) {
            $table->json('explanation_blocks')->nullable()->after('table_rows');
        });
    }

    public function down(): void
    {
        Schema::table('story_grammar', function (Blueprint $table) {
            $table->dropColumn('explanation_blocks');
        });
    }
};