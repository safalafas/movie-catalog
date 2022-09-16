<x-layout>
    <form action="/users/authenticate" method="POST">
        @csrf
        <input type="text" name="username" placeholder="Username" value="{{ old('username') }}">
        @error('username')
            {{ $message }}
        @enderror
        <input type="password" name="password" placeholder="Password">
        @error('username')
            {{ $message }}
        @enderror
        <button type="submit">Log In</button>
        <button type="reset">Cancel</button>
    </form>
</x-layout>
