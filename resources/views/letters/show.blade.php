<!-- resources/views/letters/show.blade.php -->

<h1>Related Words for Letter "{{ $letter->title }}"</h1>

@if($relatedWords->count() > 0)
    <ul>
        @foreach($relatedWords as $word)
            <li>
                <a href="{{ route('words.show', $word->id) }}">{{ $word->title }} - {{ $word->synonyms()->count() }}</a>
            </li>
        @endforeach
    </ul>

    <div class="pagination">
        @if ($relatedWords->currentPage() > 1)
            <a href="{{ $relatedWords->previousPageUrl() }}">Previous</a>
        @endif

        @for ($i = 1; $i <= $relatedWords->lastPage(); $i++)
            <a href="{{ $relatedWords->url($i) }}" class="{{ $i == $relatedWords->currentPage() ? 'active' : '' }}">{{ $i }}</a>
        @endfor

        @if ($relatedWords->currentPage() < $relatedWords->lastPage())
            <a href="{{ $relatedWords->nextPageUrl() }}">Next</a>
        @endif
    </div>
@else
    <p>No related words found for this letter.</p>
@endif

<a href="{{ route('home.index') }}">Back to Home</a>
