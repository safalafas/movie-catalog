<x-layout>
    <div class="user-profile-container">
        <div class="user-profile-card">
            <div class="user-profile-avatar-wrapper">
                <img src="{{ $user->profile_picture ? asset('storage/' . $user->profile_picture) : asset('/images/default_profile.png') }}"
                     alt="{{ $user->username }}'s Avatar" class="user-profile-avatar">
            </div>
            <div class="user-profile-info">
                <h1 class="user-profile-username">{{ $user->username }}</h1>
                <p class="user-profile-email">{{ $user->email }}</p>
                <div class="user-profile-stats">
                    <span class="profile-stat-badge">{{ $user->movies->count() }} {{ Str::plural('Favorite Movie', $user->movies->count()) }}</span>
                </div>
            </div>
            @auth
                @if (auth()->user()->id === $user->id)
                    <div class="user-profile-actions">
                        <a href="/users/{{ $user->id }}/edit" class="btn-profile-edit">Edit Profile</a>
                    </div>
                @endif
            @endauth
        </div>

        <section class="user-favorites-section">
            <h2 class="section-title">{{ $user->username }}'s Favorite Movies</h2>
            @unless($user->movies->count() == 0)
                <div class="movies-grid">
                    @foreach ($user->movies as $movie)
                        <x-movies-card :movie="$movie" />
                    @endforeach
                </div>
            @else
                <div class="no-movies-alert">
                    <p>No favorite movies added yet.</p>
                </div>
            @endunless
        </section>
    </div>
</x-layout>
