<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- @if ($isAdmin)
        <title>Stockburada - Admin Paneli</title>
    @else
        <title>Stockburada - Kullanıcı Paneli</title>
    @endif --}}

    <!-- Favicon -->
    <link rel="shortcut icon" href="/img/core-img/favicon.png" type="image/x-icon">

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />

    <!-- Scripts -->
    @routes
    <script src="{{ mix('js/app.js') }}" defer></script>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-2KRFXY0JBK"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'G-2KRFXY0JBK');
    </script>
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
