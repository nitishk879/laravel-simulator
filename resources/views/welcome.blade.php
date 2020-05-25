<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? 'Login' }} | {{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    {{--    theme Requirement--}}
    <link rel="stylesheet" href="{{ asset("css/vendor.bundle.base.css") }}">
    <!-- Fonts -->
    {{--  Font awesome  --}}
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}" />
</head>

<body>
<div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth lock-full-bg">
            <div class="row w-100">
                <div class="col-lg-4 mx-auto">
                    <div class="auth-form-transparent text-left p-5 text-center">
                        <img src="{{ asset("images/logo.png") }}" class="lock-profile-img" alt="{{ config('app.name') }}">
                        <div class="pt-5">
                            <div class="mt-5">
                                <a class="btn btn-block btn-info btn-lg font-weight-medium" href="{{ route("xlung-vcv") }}">{{ __('Physiolung') }}</a>
                            </div>
                            <div class="pt-5">
                                <div class="btn-group">
                                    <a class="btn btn-lg btn-success btn-lg font-weight-medium" href="{{ route("xlung-vcv") }}">{{ __("Xlung VCV") }}</a>
                                    <a class="btn btn-lg btn-success btn-lg font-weight-medium" href="{{ route("xlung-pcv") }}">{{ __("Xlung PCV") }}</a>
                                </div>
                            </div>
                            <div class="mt-5">
                                <a class="btn btn-block btn-warning btn-lg font-weight-medium" href="{{ route("psv") }}">{{ __('PSV') }}</a>
                            </div>
                            <div class="mt-3 text-center">
                                <a href="{{ route("login") }}" class="auth-link text-white">{{ __("Login account") }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="{{ asset("js/vendor.bundle.base.js") }}"></script>
<script type="text/javascript" src="{{ asset("js/off-canvas.js") }}"></script>
<script type="text/javascript" src="{{ asset("js/hoverable-collapse.js") }}"></script>
<script type="text/javascript" src="{{ asset("js/template.js") }}"></script>
</body>
</html>
