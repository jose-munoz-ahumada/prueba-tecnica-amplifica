<html>
    <head>
        <title>{{ $title ?? config('app.name') }}</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">
        @vite(['resources/js/app.js', 'resources/css/app.css'])
    </head>
    <body class="font-display">
        <x-navbar />
        <main class="mt-8">
            {{ $slot }}
        </main>
    </body>
</html>
