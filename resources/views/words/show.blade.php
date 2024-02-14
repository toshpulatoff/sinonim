<!-- resources/views/words/show.blade.php -->

<h1>{{ $word->title }}</h1>
<p><strong>Slug:</strong> {{ $word->slug }}</p>
<p><strong>Letter:</strong> {{ $word->letter->title }}</p>

<h2>Synonyms:</h2>
<ul>
    @foreach ($word->synonyms as $synonym)
        <li><a href="{{ route('words.show', $synonym->id) }}">{{ $synonym->title }}</a></li>
    @endforeach
</ul>

<form action="{{ route('words.incrementRequests', $word->id) }}" method="POST">
    @csrf
    <button type="submit">Request Synonyms</button>
</form>

<h2>Random Words:</h2>
<ul>
    @foreach ($randomWords as $randomWord)
        <li><a href="{{ route('words.show', $randomWord->id) }}">{{ $randomWord->title }}</a></li>
    @endforeach
</ul>

<a href="{{ route('home.index') }}">Back to all words</a>
