<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('assets\img\exxefy-fav.png') }}" sizes="20x20" type="image/png">

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />

    <!-- Scripts -->
    @routes
    <script src="/js/app.js?v=1234578" defer></script>

</head>

<body class="font-sans antialiased body-scrollbar">
    @inertia

    @if (request()->getHost() === '127.0.0.1' || request()->getHost() === 'localhost')
        @if (env('HOT_RELOAD'))
            <script src="{{ mix('js/bundle.js') }}"></script>
        @endif
    @endif
</body>

</html>
