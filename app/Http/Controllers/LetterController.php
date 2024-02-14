<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Letter;

class LetterController extends Controller
{
    public function show($id)
    {
        $letter = Letter::findOrFail($id);
        $relatedWords = $letter->words()->orderBy('title', 'asc')->paginate(10);

        return view('letters.show', compact('letter', 'relatedWords'));
    }
}
