<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <link href="{{ asset('backend/src/images/logo.svg') }}" rel="shortcut icon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('frontend/output.css') }}" rel="stylesheet">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap">
    <link rel="stylesheet" href="{{ asset('frontend/assets/fonts/clash-display/clash-display.css') }} ">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800;900&display=swap"
        rel="stylesheet" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
</head>

<body>



    {{--  header  --}}
    @include('frontend.body.header')
    {{--  header  --}}


    @yield('frontend')


    {{--  footer  --}}
    @include('frontend.body.footer')
    {{--  footer  --}}

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="{{ asset('frontend/js/index.js') }}"></script>
</body>

</html>
