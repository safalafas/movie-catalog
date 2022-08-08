<x-layout>
    <form action="/movies" method="post" enctype='multipart/form-data'>
        @csrf
        <input type="text" name="title" placeholder="Movie Title" value="{{ old('title') }}">
        @error('title')
            <p>{{ $message }}</p>
        @enderror
        <textarea name="description" placeholder="Movie Description" value="{{ old('description') }}"></textarea>
        @error('description')
            <p>{{ $message }}</p>
        @enderror
        <input type="file" name="poster" accept="image/*" value="{{ old('poster') }}">
        @error('poster')
            <p>{{ $message }}</p>
        @enderror
        <label for="release_date">Release Date</label>
        <input type="date" id='release_date' name="release_date" value="{{ old('release_date') }}">
        @error('release_date')
            <p>{{ $message }}</p>
        @enderror
        <label for="publish_status">Status</label>
        <select name="is_published" id="publish_status" value="{{ old('is_published') }}">
            <option value="1">Published</option>
            <option value="0">Unpublished</option>
        </select>
        @error('is_published')
            <p>{{ $message }}</p>
        @enderror
        <button type="submit">Submit</button>
        <button type="reset">Cancel</button>

    </form>
</x-layout>
