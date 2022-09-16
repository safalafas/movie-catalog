<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Movie Catalog</title>
</head>

<body>
    @auth
        Welcome {{auth()->user()->name}}
        @include('partials._formLogout');
    @endauth
    {{ $slot }}
</body>

</html>
