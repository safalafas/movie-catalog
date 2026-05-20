@props(['user'])

<div class="user-card">
    <div class="user-card-avatar-wrapper">
        <img src="{{ $user->profile_picture ? asset('storage/' . $user->profile_picture) : asset('/images/default_profile.png') }}"
             alt="{{ $user->username }}'s Profile Picture" class="user-card-avatar">
    </div>
    <div class="user-card-body">
        <h3 class="user-card-name">
            <a href="/users/{{ $user->id }}">{{ $user->username }}</a>
        </h3>
        <p class="user-card-email">{{ $user->email }}</p>
        <div class="user-card-stats">
            <span class="stat-badge">{{ $user->movies->count() }} {{ Str::plural('Favorite', $user->movies->count()) }}</span>
        </div>
    </div>
</div>
