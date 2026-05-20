<x-layout>
    <div class="movies-index-container">
        <section class="filters-section">
            @include('partials._movieFilters')
        </section>

        <section class="movies-list-section">
            <h1 class="section-title">Explore Movies</h1>
            @unless(count($movies) == 0)
                <div class="movies-grid">
                    @foreach ($movies as $movie)
                        <x-movies-card :movie="$movie" />
                    @endforeach
                </div>
            @else
                <div class="no-movies-alert">
                    <p>No movies match your criteria.</p>
                </div>
            @endunless
        </section>

        <div class="pagination-wrapper">
            {{ $movies->links() }}
        </div>
    </div>
</x-layout>
