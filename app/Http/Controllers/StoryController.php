<?php

namespace App\Http\Controllers;

use App\Models\Story;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class StoryController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        $query = Story::where('is_published', true)
            ->orderBy('level')
            ->orderBy('sort_order');

        if ($request->has('level')) {
            $query->where('level', $request->level);
        }

        return response()->json($query->get());
    }

    public function show(Story $story): JsonResponse
    {
        $story->load(['paragraphs', 'keywords', 'grammar']);
        return response()->json($story);
    }
}