<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
</head>

<body>

    <header>
        @include('layouts.navbar')
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
        @include('layouts.footer')
    </footer>

</body>

</html>
