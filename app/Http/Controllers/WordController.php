<?php

namespace App\Http\Controllers;

use App\Models\Word;
use App\Models\Letter;
use Illuminate\Http\Request;

class WordController extends Controller
{
    public function create()
    {
        $letters = Letter::all();
        $words = Word::all();

        return view('words.create', compact('letters', 'words'));
    }

    public function show($id)
    {
        $word = Word::findOrFail($id);

        $randomWords = Word::has('synonyms')
            ->where('id', '!=', $id)
            ->inRandomOrder()
            ->limit(10)
            ->get();

        return view('words.show', compact('word', 'randomWords'));
    }

    public function incrementRequests($id)
    {
        $word = Word::findOrFail($id);
        $word->increment('requests_count');

        return redirect()->back()->with('success', 'Requests for synonyms incremented successfully.');
    }

    public function store(Request $request)
    {
        $word = Word::create([
            'title' => $request->title,
            'slug' => $request->slug,
            'letter_id' => $request->letter_id,
        ]);

        $synonyms = $request->synonyms ?? [];
        foreach ($synonyms as $synonymId) {
            $word->synonyms()->attach($synonymId);
            Word::find($synonymId)->synonyms()->attach($word->id);
        }

        return redirect()->route('home.index')->with('success', 'Word created successfully.');
    }
}
