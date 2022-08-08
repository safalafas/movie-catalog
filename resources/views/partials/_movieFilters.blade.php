<form action="/" method="GET">
    <input type="text" name='search' placeholder="Search Movies">
    <input type="date" name='released-from'>
    <input type="date" name='released-until' value='{{ date('Y-m-d') }}'>
    <button type="submit">Search</button>
</form>
