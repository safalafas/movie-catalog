<x-layout>
    <div class="profile-edit-container">
        <div class="profile-edit-card">
            <h1 class="form-title">Edit Profile</h1>
            <p class="form-subtitle">Update your personal details and account settings.</p>

            <form action="/users/{{ $user->id }}" method="POST" enctype="multipart/form-data" class="modern-form">
                @csrf
                @method('PUT')

                <div class="profile-avatar-upload-group">
                    <div class="avatar-preview-wrapper">
                        <img src="{{ $user->profile_picture ? asset('storage/' . $user->profile_picture) : asset('/images/default_profile.png') }}" 
                             alt="Avatar Preview" class="avatar-preview-img">
                    </div>
                    <div class="avatar-upload-controls">
                        <label for="profile_picture" class="form-label">New Avatar</label>
                        <input type="file" id="profile_picture" name="profile_picture" accept="image/*" class="form-control-file">
                        @error('profile_picture')
                            <span class="error-msg">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" id="username" name="username" value="{{ old('username', $user->username) }}" class="form-control" required>
                    @error('username')
                        <span class="error-msg">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="email" class="form-label">Email Address</label>
                    <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}" class="form-control" required>
                    @error('email')
                        <span class="error-msg">{{ $message }}</span>
                    @enderror
                </div>

                <fieldset class="form-fieldset">
                    <legend class="fieldset-legend">Change Password</legend>
                    <p class="fieldset-helper-text">Leave these fields blank to keep your current password.</p>
                    
                    <div class="form-group">
                        <label for="password" class="form-label">New Password</label>
                        <input type="password" id="password" name="password" placeholder="Min. 8 characters" class="form-control">
                        @error('password')
                            <span class="error-msg">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="password_confirmation" class="form-label">Confirm New Password</label>
                        <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Confirm new password" class="form-control">
                    </div>
                </fieldset>

                <div class="form-actions">
                    <button type="submit" class="btn-primary">Save Changes</button>
                    <a href="/users/{{ $user->id }}" class="btn-secondary">Cancel</a>
                </div>
            </form>
        </div>

        <div class="profile-danger-card">
            <h2 class="danger-title">Danger Zone</h2>
            <p class="danger-text">Permanently delete your profile and all associated data. This action is irreversible.</p>
            <form method="POST" action="/users/{{ $user->id }}" onsubmit="return confirm('Are you absolutely sure you want to delete your profile?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn-danger">Delete Account</button>
            </form>
        </div>
    </div>
</x-layout>
