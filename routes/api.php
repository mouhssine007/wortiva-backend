<?php

use App\Http\Controllers\StoryController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::get('/stories', [StoryController::class, 'index']);
    Route::get('/stories/{story}', [StoryController::class, 'show']);
});