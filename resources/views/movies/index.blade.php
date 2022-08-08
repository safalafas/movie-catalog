<x-layout>
    @unless(count($movies) == 0)
        @foreach ($movies as $movie)
            <x-movies-card :movie="$movie" />
        @endforeach
    @else
        <p>No Movies to Show</p>
    @endunless
    <div>
        {{ $movies->links() }}
    </div>
</x-layout>
