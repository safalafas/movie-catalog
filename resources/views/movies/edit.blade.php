<x-layout>
    <form action="/movies/{{ $movie->id }}" method="post" enctype='multipart/form-data'>
        @csrf
        @method('PUT')
        <input type="text" name="title" placeholder="Movie Title" value="{{ $movie->title }}">
        @error('title')
            <p>{{ $message }}</p>
        @enderror
        <textarea name="description" placeholder="Movie Description">{{ $movie->description }}</textarea>
        @error('description')
            <p>{{ $message }}</p>
        @enderror
        <input type="file" name="poster" accept="image/*">

        @if ($movie->poster)
            <img src='/storage/{{ $movie->poster }}' alt='Poster'>
        @endif
        @error('poster')
            <p>{{ $message }}</p>
        @enderror
        <label for="release_date">Release Date</label>
        <input type="date" id='release_date' name="release_date" value="{{ $movie->release_date }}">
        @error('release_date')
            <p>{{ $message }}</p>
        @enderror
        <label for="publish_status">Status</label>
        <select name="is_published" id="publish_status">
            <option value="1" {{ $movie->is_published ? 'selected' : '' }}>Published</option>
            <option value="0" {{ $movie->is_published ? '' : 'selected' }}>Unpublished</option>
        </select>
        @error('is_published')
            <p>{{ $message }}</p>
        @enderror
        <button type="submit">Submit</button>
        <button type="reset">Cancel</button>

    </form>
    <form method="POST" action="/movies/{{ $movie->id }}">
        @csrf
        @method('DELETE')
        <button type="submit">Delete</button>
    </form>
</x-layout>
