<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<x-includes.head />

<body class="light-version">

    <x-includes.header />

    @yield('content')

    <x-includes.footer />
    <x-includes.script />
</body>

</html>
