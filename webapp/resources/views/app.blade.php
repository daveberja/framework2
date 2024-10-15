<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title inertia>{{ $title ?? 'Laravel Dashboard' }}</title>

    <!-- Include your compiled CSS -->
    @vite('resources/css/app.css')
</head>
<body class="font-sans antialiased dark:bg-gray-900 dark:text-gray-200">
    <div id="app" data-page="{{ json_encode($page) }}"></div>

    <!-- Include your compiled JS -->
    @vite('resources/js/app.js')
</body>
</html>
