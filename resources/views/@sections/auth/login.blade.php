{{--<!doctype html>--}}
{{--<html lang="en">--}}
{{--<head>--}}
{{--    <meta charset="utf-8" />--}}
{{--    <meta name="viewport" content="width=device-width, initial-scale=1" />--}}
{{--    <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc." />--}}

{{--    <!-- Libs CSS -->--}}
{{--    @vite(['resources/css/libs.bundle.css'])--}}

{{--    <!-- Theme CSS -->--}}
{{--    @vite(['resources/css/theme.bundle.css'])--}}

{{--    <!-- Title -->--}}
{{--    <title>Dashkit</title>--}}
{{--</head>--}}
{{--<body class="d-flex align-items-center bg-auth border-top border-top-2 border-primary">--}}

{{--<!-- CONTENT--}}
{{--================================================== -->--}}
{{--<div class="container">--}}
{{--    <div class="row align-items-center">--}}
{{--        <div class="col-12 col-md-6 offset-xl-2 offset-md-1 order-md-2 mb-5 mb-md-0">--}}

{{--            <!-- Image -->--}}
{{--            <div class="text-center">--}}
{{--                <img src="images/happiness.svg" alt="..." class="img-fluid">--}}
{{--            </div>--}}

{{--        </div>--}}
{{--        <div class="col-12 col-md-5 col-xl-4 order-md-1 my-5">--}}

{{--            <!-- Heading -->--}}
{{--            <h1 class="display-4 text-center mb-3">--}}
{{--                Sign up--}}
{{--            </h1>--}}

{{--            <!-- Subheading -->--}}
{{--            <p class="text-muted text-center mb-5">--}}
{{--                Free access to our dashboard.--}}
{{--            </p>--}}

{{--            <!-- Form -->--}}
{{--            <form>--}}

{{--                <!-- Email address -->--}}
{{--                <div class="form-group">--}}

{{--                    <!-- Label -->--}}
{{--                    <label class="form-label">--}}
{{--                        Email Address--}}
{{--                    </label>--}}

{{--                    <!-- Input -->--}}
{{--                    <input type="email" class="form-control" placeholder="name@address.com">--}}

{{--                </div>--}}

{{--                <!-- Password -->--}}
{{--                <div class="form-group">--}}

{{--                    <!-- Label -->--}}
{{--                    <label class="form-label">--}}
{{--                        Password--}}
{{--                    </label>--}}

{{--                    <!-- Input group -->--}}
{{--                    <div class="input-group input-group-merge">--}}

{{--                        <!-- Input -->--}}
{{--                        <input class="form-control" type="password" placeholder="Enter your password">--}}

{{--                        <!-- Icon -->--}}
{{--                        <span class="input-group-text">--}}
{{--                  <i class="fe fe-eye"></i>--}}
{{--                </span>--}}

{{--                    </div>--}}
{{--                </div>--}}

{{--                <!-- Submit -->--}}
{{--                                    <button type="submit" class="btn btn-lg btn-block btn-primary mt-5">--}}
{{--                                        Войти в Систему--}}
{{--                                    </button>--}}

{{--                <!-- Link -->--}}
{{--                <div class="text-center">--}}
{{--                    <small class="text-muted text-center">--}}
{{--                        Already have an account? <a href="sign-in-illustration.html">Log in</a>.--}}
{{--                    </small>--}}
{{--                </div>--}}

{{--            </form>--}}

{{--        </div>--}}
{{--    </div> <!-- / .row -->--}}
{{--</div> <!-- / .container -->--}}

{{--<!-- JAVASCRIPT -->--}}
{{--<!-- Map JS -->--}}
{{--<script src='https://api.mapbox.com/mapbox-gl-js/v0.53.0/mapbox-gl.js'></script>--}}

{{--<!-- Vendor JS -->--}}
{{--<script src="./assets/js/vendor.bundle.js"></script>--}}

{{--<!-- Theme JS -->--}}
{{--<script src="./assets/js/theme.bundle.js"></script>--}}

{{--</body>--}}
{{--</html>--}}


@extends('layouts.login_app')

<!-- Форма для авторизации -->

@section('@sections/auth/login_blade')

    <div class="container">
        <!-- <div class="row justify-content-center"> -->
        <div class="row">
            <div class="col-12 col-md-5 col-xl-4 my-5 personal">
                <h2 class="display-5 text-center mb-3">{{ trans('panel.site_title') }}</h2>
                <h5 class="text-info text-center mb-5">{{ trans('panel.site_description') }}</h5>

                <form class="form-horizontal" method="POST" action="{{ route('login') }}">

                @csrf

                <!--  -->
                    <div class="form-group">
                        <label for="email" class="colors.coolGray #111827"
                               style="color:white;">{{ trans('global.login') }}</label>

                        <input id="email" name="email" type="text"
                               class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" required
                               autocomplete="email" autofocus placeholder="{{ trans('global.login_email') }}"
                               value="{{ old('email', null) }}">


                    </div>

                    <!--  -->
                    <div class="form-group">
                        <div class="row">
                            <div class="col">
                                <label for="password" style="color:white;">{{ trans('global.login_password') }}</label>

                            </div>
                        </div>

                        <div class="input-group input-group-merge">
                            <input id="password" name="password" type="password"
                                   class="form-control{{ $errors->all() ? ' is-invalid' : '' }}" required
                                   placeholder="{{ trans('global.login_password') }}">
                            @if($errors->has('password'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('password') }}
                                </div>
                            @endif
                        </div>
                    </div>

                    @if ($errors->all())
                        <span class="help-block text-center pb-5" style="color:red; font-size: 17px;">
                                         <button type="submit" class="btn btn-lg btn-block btn-danger mt-5"> <strong>{{ $errors->first('email') }}</strong>

                        </button>

                                </span>

                    @else

                        <button type="submit" class="btn btn-lg btn-block btn-primary mt-5">
                            Войти в Систему
                        </button>

                    @endif


                </form>
            </div>
        </div>
    </div>

@endsection
