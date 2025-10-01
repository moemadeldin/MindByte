<!doctype html>
<html class="h-full bg-gray-900">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    @vite('resources/css/app.css')
    <title>{{ $title ?? 'Auth Page' }}</title>
</head>
<body class="h-full">
    {{ $slot }}
</body>
</html>
