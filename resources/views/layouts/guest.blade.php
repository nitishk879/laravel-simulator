<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') | {{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    {{--    theme Requirement--}}
    <link rel="stylesheet" href="{{ asset("css/vendor.bundle.base.css") }}">
    <link rel="stylesheet" href="{{ asset("css/app.css") }}">
    <!-- Fonts -->
    {{--  Font awesome  --}}
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    @include('layouts.favicons')
</head>

<body>

@yield('content')

<script type="text/javascript" src="{{ asset("js/vendor.bundle.base.js") }}"></script>
<script type="text/javascript" src="{{ asset("js/off-canvas.js") }}"></script>
<script type="text/javascript" src="{{ asset("js/hoverable-collapse.js") }}"></script>
<script type="text/javascript" src="{{ asset("js/template.js") }}"></script>
</body>
</html>
