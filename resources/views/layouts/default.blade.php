<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'First Laravel App')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 text-gray-900 min-h-screen flex items-center flex-col">

    <header class="w-full sticky top-0 z-50">
        @yield('header')
    </header>
    <div class="flex-1 overflow-y-auto flex-col justify-between">
        <main>
            @yield('body-content')
        </main>
        <footer>
            @yield('footer')
        </footer>
    </div>
</body>
</html>