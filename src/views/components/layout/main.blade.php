<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title ?? 'Todo Manager' }}</title>
    <link href="{{ asset('vendor/Skeleton/css/app.css') }}" rel="stylesheet">
    @stack('css')
</head>
<body>
    @if (Auth::check())
        <x-skeleton::layout.navbar />
    @endif
    <x-skeleton::layout.flash />
    {{ $slot }}
</body>
    <script src="{{ asset('vendor/Skeleton/js/app.js') }}"></script>
    @stack('js')
</html>
