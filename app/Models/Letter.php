<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Letter extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'slug'];

    public function words(): HasMany
    {
        return $this->hasMany(Word::class);
    }
}
