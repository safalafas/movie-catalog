<x-layout>
    <form action="/users" method="post" enctype="multipart/form-data">
        @csrf
        <input type="file" name="profile-picture">
        <input type="text" name="username" placeholder="Username">
        <input type="password" name="password" placeholder="Password">
        <input type="password" name="password_confirmation" placeholder="Confirm Password">
        <input type="email" name="email" placeholder="Email Address">
        <button type="submit">Register</button>
        <button type="reset">Cancel</button>
    </form>
</x-layout>
