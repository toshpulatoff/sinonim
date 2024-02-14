<!-- words/create.blade.php -->

<form action="{{ route('words.store') }}" method="POST">
    @csrf
    <div>
        <label for="title">Title:</label>
        <input type="text" name="title" id="title" required>
    </div>
    <div>
        <label for="slug">Slug:</label>
        <input type="text" name="slug" id="slug" required>
    </div>
    <div>
        <label for="letter_id">Letter:</label>
        <select name="letter_id" id="letter_id" required>
            @foreach($letters as $letter)
            <option value="{{ $letter->id }}">{{ $letter->title }}</option>
            @endforeach
        </select>
    </div>
    <div>
        <label for="synonyms">Synonyms:</label>
        <select name="synonyms[]" id="synonyms" multiple>
            @foreach($words as $word)
            <option value="{{ $word->id }}">{{ $word->title }}</option>
            @endforeach
        </select>
    </div>
    <div>
        <label for="status">Status:</label>
        <select name="status" id="status" required>
            <option value="active">Active</option>
            <option value="inactive">Inactive</option>
        </select>
    </div>

    <button type="submit">Create Word</button>
</form>

<a href="{{ route('home.index') }}">Back to all words</a>