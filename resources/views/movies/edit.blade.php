<x-layout>
    <div class="profile-edit-container">
        <div class="profile-edit-card">
            <h1 class="form-title">Edit Movie</h1>
            <p class="form-subtitle">Update details for "{{ $movie->title }}".</p>

            <form action="/movies/{{ $movie->id }}" method="POST" enctype="multipart/form-data" class="modern-form">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="title" class="form-label">Movie Title</label>
                    <input type="text" id="title" name="title" value="{{ old('title', $movie->title) }}" class="form-control" required>
                    @error('title')
                        <span class="error-msg">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="description" class="form-label">Description / Synopsis</label>
                    <textarea id="description" name="description" class="form-control form-textarea" required>{{ old('description', $movie->description) }}</textarea>
                    @error('description')
                        <span class="error-msg">{{ $message }}</span>
                    @enderror
                </div>

                <div class="profile-avatar-upload-group">
                    <div class="avatar-preview-wrapper movie-poster-preview">
                        <img src="{{ $movie->poster ? asset('storage/' . $movie->poster) : asset('/images/default.jpg') }}" 
                             alt="Poster Preview" class="avatar-preview-img">
                    </div>
                    <div class="avatar-upload-controls">
                        <label for="poster" class="form-label">Change Poster Image</label>
                        <input type="file" id="poster" name="poster" accept="image/*" class="form-control-file">
                        @error('poster')
                            <span class="error-msg">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="form-grid-2">
                    <div class="form-group">
                        <label for="release_date" class="form-label">Release Date</label>
                        <input type="date" id="release_date" name="release_date" value="{{ old('release_date', $movie->release_date) }}" class="form-control" required>
                        @error('release_date')
                            <span class="error-msg">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="publish_status" class="form-label">Publish Status</label>
                        <select id="publish_status" name="is_published" class="form-control form-select">
                            <option value="1" {{ old('is_published', $movie->is_published) == '1' ? 'selected' : '' }}>Published</option>
                            <option value="0" {{ old('is_published', $movie->is_published) == '0' ? 'selected' : '' }}>Draft (Unpublished)</option>
                        </select>
                        @error('is_published')
                            <span class="error-msg">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn-primary">Save Changes</button>
                    <a href="/movies/{{ $movie->id }}" class="btn-secondary">Cancel</a>
                </div>
            </form>
        </div>

        <div class="profile-danger-card">
            <h2 class="danger-title">Danger Zone</h2>
            <p class="danger-text">Delete this movie from the catalog permanently. This action is irreversible.</p>
            <form method="POST" action="/movies/{{ $movie->id }}" onsubmit="return confirm('Are you sure you want to delete this movie?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn-danger">Delete Movie</button>
            </form>
        </div>
    </div>
</x-layout>
