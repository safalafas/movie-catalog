@props(['movie'])

<article class="movie-card">
    <div class="movie-poster-wrapper">
        <a href="/movies/{{ $movie->id }}">
            <img src="{{ $movie->poster ? asset('storage/' . $movie->poster) : asset('/images/default.jpg') }}"
                alt="{{ $movie->title }} Poster" class="movie-poster">
        </a>
    </div>
    <div class="movie-info">
        <header class="movie-header">
            <h2 class="movie-title">
                <a href="/movies/{{ $movie->id }}">{{ $movie->title }}</a>
            </h2>
            <span class="movie-date">Released: {{ \Carbon\Carbon::parse($movie->release_date)->format('M d, Y') }}</span>
        </header>
        <p class="movie-description">{{ Str::limit($movie->description, 180) }}</p>
        
        <div class="movie-actions">
            @auth
                @php
                    $isLiked = $movie->users->contains(auth()->user()->id);
                @endphp
                <form method="POST" action="/{{ $isLiked ? 'dislike' : 'like' }}" class="like-form">
                    @if ($isLiked)
                        @method('DELETE')
                    @endif
                    @csrf
                    <input type="hidden" name="users_id" value="{{ auth()->user()->id }}">
                    <input type="hidden" name="movies_id" value="{{ $movie->id }}">
                    <button type="submit" class="btn-like {{ $isLiked ? 'liked' : '' }}" title="{{ $isLiked ? 'Dislike' : 'Like' }}">
                        <svg class="heart-icon" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/>
                        </svg>
                    </button>
                    <span class="likes-count">{{ $movie->users->count() }} {{ Str::plural('like', $movie->users->count()) }}</span>
                </form>
            @else
                <div class="guest-likes">
                    <svg class="heart-icon disabled" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/>
                    </svg>
                    <span class="likes-count">{{ $movie->users->count() }} {{ Str::plural('like', $movie->users->count()) }}</span>
                </div>
            @endauth

            @auth
                <div class="admin-links">
                    <a href="/movies/{{ $movie->id }}/edit" class="btn-edit-link">Edit</a>
                </div>
            @endauth
        </div>
    </div>
</article>
