<x-layout>
    <div class="form-container-wrapper">
        <div class="form-card">
            <h1 class="form-title">Add New Movie</h1>
            <p class="form-subtitle">Share a movie you love with the catalog community.</p>

            <form action="/movies" method="POST" enctype="multipart/form-data" class="modern-form">
                @csrf

                <div class="form-group">
                    <label for="title" class="form-label">Movie Title</label>
                    <input type="text" id="title" name="title" placeholder="e.g. Inception" value="{{ old('title') }}" class="form-control" required>
                    @error('title')
                        <span class="error-msg">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="description" class="form-label">Description / Synopsis</label>
                    <textarea id="description" name="description" placeholder="What is this movie about?" class="form-control form-textarea" required>{{ old('description') }}</textarea>
                    @error('description')
                        <span class="error-msg">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="poster" class="form-label">Movie Poster</label>
                    <input type="file" id="poster" name="poster" accept="image/*" class="form-control-file">
                    @error('poster')
                        <span class="error-msg">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-grid-2">
                    <div class="form-group">
                        <label for="release_date" class="form-label">Release Date</label>
                        <input type="date" id="release_date" name="release_date" value="{{ old('release_date') }}" class="form-control" required>
                        @error('release_date')
                            <span class="error-msg">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="publish_status" class="form-label">Publish Status</label>
                        <select id="publish_status" name="is_published" class="form-control form-select">
                            <option value="1" {{ old('is_published', '1') == '1' ? 'selected' : '' }}>Published</option>
                            <option value="0" {{ old('is_published') == '0' ? 'selected' : '' }}>Draft (Unpublished)</option>
                        </select>
                        @error('is_published')
                            <span class="error-msg">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn-primary">Add Movie</button>
                    <a href="/" class="btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</x-layout>
