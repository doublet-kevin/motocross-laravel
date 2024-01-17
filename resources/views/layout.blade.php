<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Motocross</title>
    @vite('resources/css/app.css')
</head>

<body class="antialiased">
    <header></header>
    <main>@yield('content')</main>
    <footer></footer>
</body>

</html>
