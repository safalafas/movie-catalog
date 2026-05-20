<x-layout>
    <div class="form-container-wrapper">
        <div class="form-card">
            <h1 class="form-title">Welcome Back</h1>
            <p class="form-subtitle">Log in to manage your favorite movie collection.</p>

            <form action="/users/authenticate" method="POST" class="modern-form">
                @csrf

                <div class="form-group">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" id="username" name="username" placeholder="Enter your username" value="{{ old('username') }}" class="form-control" required autofocus>
                    @error('username')
                        <span class="error-msg">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" id="password" name="password" placeholder="Enter your password" class="form-control" required>
                    @error('password')
                        <span class="error-msg">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn-primary">Log In</button>
                    <a href="/" class="btn-secondary">Cancel</a>
                </div>
            </form>
            <p class="form-footer">Don't have an account? <a href="/register">Sign Up</a></p>
        </div>
    </div>
</x-layout>
