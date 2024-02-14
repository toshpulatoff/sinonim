<!-- resources/views/search.blade.php -->

<h1>Search Results</h1>

@if(count($searchResults) > 0)
    <ul>
        @foreach($searchResults as $result)
            <li>
                <a href="{{ route('words.show', $result->id) }}">
                    <strong>{{ $result->title }}</strong>
                </a>
            </li>
        @endforeach
    </ul>
@else
    <p>No results found for your search query.</p>
@endif

<p><a href="{{ route('home.index') }}">Back to Home</a></p>
