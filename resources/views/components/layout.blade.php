<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Movie Catalog</title>
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Outfit:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- Vite Assets -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <header class="app-header">
        <div class="nav-container">
            <a href="/" class="app-logo">
                <span class="logo-pop">Movie</span>Catalog
            </a>
            <nav class="app-nav">
                <a href="/" class="nav-link {{ request()->is('/') ? 'active' : '' }}">Movies</a>
                @auth
                    <a href="/users" class="nav-link {{ request()->is('users') ? 'active' : '' }}">Users</a>
                    <a href="/movies/create" class="nav-link {{ request()->is('movies/create') ? 'active' : '' }}">Add Movie</a>
                @endauth
            </nav>
            <div class="auth-section">
                @auth
                    <div class="user-profile-menu">
                        <a href="/users/{{ auth()->user()->id }}" class="profile-link">
                            <img src="{{ auth()->user()->profile_picture ? asset('storage/' . auth()->user()->profile_picture) : asset('/images/default_profile.png') }}"
                                 alt="Profile" class="header-avatar">
                            <span class="header-username">{{ auth()->user()->username }}</span>
                        </a>
                        <form action="/logout" method="POST" class="inline-form">
                            @csrf
                            <button type="submit" class="btn-logout">Logout</button>
                        </form>
                    </div>
                @else
                    <a href="/login" class="btn-login">Login</a>
                    <a href="/register" class="btn-register">Register</a>
                @endauth
            </div>
        </div>
    </header>

    <main class="main-content">
        {{ $slot }}
    </main>

    <footer class="app-footer">
        <p>&copy; {{ date('Y') }} MovieCatalog. Crafted for movie enthusiasts.</p>
    </footer>
</body>

</html>
