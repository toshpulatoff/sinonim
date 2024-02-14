<form action="{{ route('home.search') }}" method="GET">
    <input type="text" name="search" placeholder="Search">
    <button type="submit">Search</button>
</form>

<h1>Letters</h1>

@if(count($letters) > 0)
    <ul>
        @foreach($letters as $letter)
            <li>
                <a href="{{ route('letters.show', $letter->id) }}">{{ $letter->title }} - {{ $letter->words()->count() }}</a>
            </li>
        @endforeach
    </ul>
@else
    <p>No letters available.</p>
@endif

<h1>Random Words</h1>

@if(count($words) > 0)
    <ul>
        @foreach($words as $word)
            <li>
                <a href="{{ route('words.show', $word->id) }}">
                    <strong>{{ $word->title }}</strong>
                </a>
            </li>
        @endforeach
    </ul>
@else
    <p>No random words available.</p>
@endif

<p><a href="{{ route('words.create') }}">Create a new word</a></p>
<p><a href="{{ route('about.index') }}">About</a></p>
