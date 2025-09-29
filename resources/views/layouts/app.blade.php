<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>HubFlix | @yield('title', 'Home')</title>
    @vite([
        'resources/css/app.css', 
        'resources/js/app.js',
        'resources/js/app/filters.js',
        'resources/js/app/table-movies.js'
    ])
</head>
<body class="bg-gray-50 dark:bg-gray-900">
    <header class="container mx-auto">
        @include('partials.header')
    </header>

    <main class="container mx-auto sm:p-5 antialiased">

        @yield('content')
    </main>
    
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/datepicker.min.js"></script>
</body>
</html>