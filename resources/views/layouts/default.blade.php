<!DOCTYPE html>
<html>

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8">
    <meta name="robots" content="noindex">
    <meta name="googlebot" content="noindex">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>
        @yield('title', env("APP_NAME"))
    </title>

    <!-- Favicon -->
    <link rel="icon" href="/images/logo.png" type="image/x-icon">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,700;1,300&display=swap"
        rel="stylesheet">

    <!-- Icons -->
    <link rel="stylesheet" href="/theme/ag/css/nucleo.css" type="text/css">
    <link rel="stylesheet" href="/theme/ag/all.min.css" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    @yield('appCss')

    <link rel="stylesheet" href="/theme/ag/argon.min.css?v=1.2.0" type="text/css">
    <link rel="stylesheet" href="{{ asset(mix('css/app.css')) }}" type="text/css">
    <link rel="stylesheet" href="{{ asset(mix('css/custom.css')) }}" type="text/css">
</head>

<body class="g-sidenav-show g-sidenav-pinned  @yield('additional-class')">
    <div class="main-page">
        @yield('appNav')
        <div class="management main-content" id="panel">
            @yield('header')

            @yield('appContent')
        </div>
    </div>
    @yield('footer')

    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
        crossorigin="anonymous"></script>
    <script src="/theme/libs/ckeditor/ckeditor.js"></script>
    <script src="/theme/libs/ckeditor/config.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/laroute.js') }}"></script>
    @yield('appScript')
</body>

</html>
