<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Synonym extends Model
{
    use HasFactory;

    protected $table = 'synonyms';

    protected $fillable = ['word_id', 'synonym_id'];

    public function word()
    {
        return $this->belongsTo(Word::class);
    }
}
