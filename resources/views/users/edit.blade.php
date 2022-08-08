<x-layout>
    <form action="/users/{{ $user->id }}" method="post" enctype='multipart/form-data'>
        @csrf
        @method('PUT')
        <input type="file" name="profile_picture" accept="image/*">

        @if ($user->profile_picture)
            <img src='/storage/{{ $user->profile_picture }}' alt='Profile Picture'>
        @endif
        @error('profile_picture')
            <p>{{ $message }}</p>
        @enderror
        <input type="text" name="username" placeholder="Username" value="{{ $user->username }}">
        @error('username')
            <p>{{ $message }}</p>
        @enderror
        <input type="password" name="password" placeholder="Password" value="{{ $user->password }}">
        @error('password')
            <p>{{ $message }}</p>
        @enderror
        <input type="password" name="password_confirmation" placeholder="Confirm Password"
            value="{{ $user->password }}">
        @error('password_confirmation')
            <p>{{ $message }}</p>
        @enderror
        <input type="email" name="email" value="{{ $user->email }}">
        @error('email')
            <p>{{ $message }}</p>
        @enderror
        <button type="submit">Submit</button>
        <button type="reset">Cancel</button>

    </form>
    <form method="POST" action="/users/{{ $user->id }}">
        @csrf
        @method('DELETE')
        <button type="submit">Delete</button>
    </form>
</x-layout>
