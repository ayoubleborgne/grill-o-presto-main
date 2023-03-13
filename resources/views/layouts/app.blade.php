<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    @extends('layouts.includes.head')

</head>

<body>

    @include('layouts.includes.header')


    <main class="">
        @yield('content')
    </main>
</body>

<footer>
    @include('layouts.includes.footer')
</footer>


</html>
