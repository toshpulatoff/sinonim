<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class Word extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'slug', 'letter_id', 'requests_count', "status"];

    public function letter(): BelongsTo
    {
        return $this->belongsTo(Letter::class);
    }

    public function synonyms(): BelongsToMany
    {
        return $this->belongsToMany(Word::class, 'synonyms', 'word_id', 'synonym_id');
    }

    protected static function boot()
    {
        parent::boot();

        static::created(function ($word) {
            // Attach each synonym to the newly created word
            $synonyms = $word->synonyms()->select('words.id')->pluck('id')->toArray();
            $word->synonyms()->attach($synonyms);

            // Attach the newly created word to each synonym
            foreach ($synonyms as $synonymId) {
                $synonym = Word::find($synonymId);
                $synonym->synonyms()->attach($word->id);
            }
        });
    }
}
