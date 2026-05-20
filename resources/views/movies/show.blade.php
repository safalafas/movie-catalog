<x-layout>
    <div class="movie-detail-container">
        <div class="movie-detail-card">
            <div class="movie-detail-poster-wrapper">
                <img src="{{ $movie->poster ? asset('storage/' . $movie->poster) : asset('/images/default.jpg') }}" 
                     alt="{{ $movie->title }} Poster" class="movie-detail-poster">
            </div>
            <div class="movie-detail-info">
                <div class="movie-detail-header">
                    <h1 class="movie-detail-title">{{ $movie->title }}</h1>
                    <span class="movie-detail-date">Released: {{ \Carbon\Carbon::parse($movie->release_date)->format('M d, Y') }}</span>
                    @if(!$movie->is_published)
                        <span class="badge badge-draft">Draft</span>
                    @endif
                </div>

                <div class="movie-detail-body">
                    <h3 class="detail-section-title">Synopsis</h3>
                    <p class="movie-detail-description">{{ $movie->description }}</p>
                </div>

                <div class="movie-detail-actions">
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
                        <div class="admin-controls">
                            <a href="/movies/{{ $movie->id }}/edit" class="btn-edit">Edit Movie</a>
                        </div>
                    @endauth
                </div>
            </div>
        </div>
    </div>
</x-layout>
