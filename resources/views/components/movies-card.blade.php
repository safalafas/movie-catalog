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
    <div>
        <img src="/images/like.png" alt="Likes">
        <span>{{ $movie->likes }}</span>
    </div>

</div>
