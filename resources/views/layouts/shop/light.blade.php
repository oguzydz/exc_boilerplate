<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<x-shop.head />

<body class="light-version">

    <x-shop.header profileBgImage='url("{{ $profileBgImage }}")'/>

    @yield('content')

    <x-shop.footer />
    <x-shop.script />
</body>

</html>