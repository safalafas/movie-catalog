<x-layout>
    <div class="form-container-wrapper">
        <div class="form-card">
            <h1 class="form-title">Join MovieCatalog</h1>
            <p class="form-subtitle">Create an account to build your list of favorite movies.</p>
            
            <form action="/users" method="POST" enctype="multipart/form-data" class="modern-form">
                @csrf
                
                <div class="form-group">
                    <label for="profile_picture" class="form-label">Profile Picture</label>
                    <input type="file" id="profile_picture" name="profile_picture" accept="image/*" class="form-control-file">
                    @error('profile_picture')
                        <span class="error-msg">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" id="username" name="username" placeholder="e.g. movie_buff" value="{{ old('username') }}" class="form-control" required>
                    @error('username')
                        <span class="error-msg">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="email" class="form-label">Email Address</label>
                    <input type="email" id="email" name="email" placeholder="e.g. you@example.com" value="{{ old('email') }}" class="form-control" required>
                    @error('email')
                        <span class="error-msg">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" id="password" name="password" placeholder="Min. 8 characters" class="form-control" required>
                    @error('password')
                        <span class="error-msg">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password_confirmation" class="form-label">Confirm Password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Verify password" class="form-control" required>
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn-primary">Register</button>
                </div>
            </form>
            <p class="form-footer">Already have an account? <a href="/login">Log In</a></p>
        </div>
    </div>
</x-layout>
