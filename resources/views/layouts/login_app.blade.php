<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title> {{ trans('panel.site_title_up') }}</title>

    <!-- Scripts -->
    @vite(['resources/css/app.css','resources/css/style.css'])

</head>

<body class="">
{{--<body class="background_image">--}}

    <div>
        <main>
            @yield('@sections/auth/login_blade')
        </main>
    </div>

</body>
</html>
