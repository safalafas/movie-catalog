@props(['movie'])
@include('partials._movieFilters')
<a href="/movies/{{ $movie->id }}">
    <img src="{{ $movie->poster ? asset('storage/' . $movie->poster) : asset('/images/default.jpg') }}"
        alt="Movie Poster">
</a>
<div>
    <h2>
        <a href="/movies/{{ $movie->id }}">{{ $movie->title }}</a>
        <sup>Released {{ $movie->release_date }}</sup>
    </h2>
    <p>{{ $movie->description }}</p>
    @auth
        <form method="POST" action="/{{ $movie->users($movie->id) ? 'dislike' : 'like' }}">
            @if ($movie->users($movie->id))
                @method('DELETE')
            @endif
            @csrf
            <input type="hidden" name="users_id" value="{{ auth()->user()->id }}">
            <input type="hidden" name="movies_id" value="{{ $movie->id }}">
            <button type="submit">
                <img src="/images/like.png" alt="Like">
            </button>
            <span>{{ auth()->user()->movies->count() }} Likes</span>
        </form>
    @endauth

</div>
