@props(['user'])
<a href="/users/{{ $user->id }}">
    <img src="{{ $user->profile_picture ? asset('storage/' . $user->profile_picture) : asset('/images/default_profile.png') }}"
        alt="Profile Picture">
    <h2>{{ $user->username }}</h2>
</a>
<p>{{ $user->email }}</p>
