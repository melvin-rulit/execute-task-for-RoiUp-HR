<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title> {{ trans('test_job.site_title') }}</title>


<!-- Scripts -->
    @vite(['resources/css/fonawesome_icons.css', 'resources/css/libs.bundle.css', 'resources/css/theme.bundle.css'])
    @vite(['resources/js/app.js'])

</head>

<body>

<div id="app">
    @yield('Main_section')
</div>

</body>
</html>
