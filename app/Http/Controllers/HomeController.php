<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Word;
use App\Models\Letter;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $searchQuery = $request->input('search');
        $randomWordsCount = 10;

        $query = Word::query();

        if ($searchQuery) {
            $query->where('title', 'like', '%' . $searchQuery . '%');
        }

        $words = $query->has('synonyms')
            ->inRandomOrder()
            ->limit($randomWordsCount)
            ->get();

        $letters = Letter::all();

        return view('home', compact('words', 'letters'));
    }

    public function search(Request $request)
    {
        $searchQuery = $request->input('search');

        $searchResults = Word::where('title', 'like', '%' . $searchQuery . '%')->get();

        return view('search', compact('searchResults'));
    }
}
