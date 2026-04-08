<?php

namespace App\Http\Controllers;

use App\Models\StoryKeyword;
use Illuminate\Http\Request;

class PracticeController extends Controller
{
    public function index(Request $request)
    {
        $query = StoryKeyword::query();

        if ($request->has('level')) {
            $query->where('level', $request->level);
        }

        $keywords = $query
            ->inRandomOrder()
            ->limit(20)
            ->get(['id', 'word', 'translation', 'word_type', 'level']);

        return response()->json($keywords);
    }
}