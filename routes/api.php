<?php

use App\Http\Controllers\StoryController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::get('/stories', [StoryController::class, 'index']);
    Route::get('/stories/{story}', [StoryController::class, 'show']);
});

Route::post('/v1/translate', function (\Illuminate\Http\Request $request) {
    $text = $request->input('text');
    if (!$text) return response()->json(['error' => 'No text'], 400);
    
    $deepl = new \App\Services\DeeplService();
    $translated = $deepl->translate($text);
    
    return response()->json(['translation' => $translated]);
});