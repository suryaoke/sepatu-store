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
   
    @livewireStyles
    <style>
        .text-box {
            width: 320px;
            /* Atur lebar menjadi 100px */
            word-wrap: break-word;
            /* Membuat kata yang panjang dibagi jika melebihi lebar */
            overflow-wrap: break-word;
            /* Alternatif untuk membagi kata panjang */
        }
    </style>

    <style>
        /* Style untuk dropdown */
        ul {
            list-style-type: none;
        }

        li {
            position: relative;
            display: inline-block;
        }

        li ul {
            display: none;
            position: absolute;
            background-color: #ffffff;
            box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.2);
            min-width: 160px;
            z-index: 1;
        }

        li ul li {
            display: block;
            padding: 8px 16px;
        }

        li ul li a {
            color: #000;
            text-decoration: none;
            display: block;
        }

        li ul li a:hover {
            background-color: #f1f1f1;
        }

        /* Menampilkan dropdown saat hover */
        li:hover ul {
            display: block;
        }
    </style>

</head>

<body>
    @livewireScripts


    {{--  header  --}}
    {{--  @include('frontend.body.header')  --}}
    @yield('header')
    {{--  header  --}}
    @yield('frontend')


    {{--  footer  --}}
    @include('frontend.body.footer')
    {{--  footer  --}}
    <script src=" {{ asset('frontend/js/details.js') }} "></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="{{ asset('frontend/js/index.js') }}"></script>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const dropdownLink = document.querySelector('li a.dropdown-toggle');
            const dropdownMenu = dropdownLink.nextElementSibling;

            dropdownLink.addEventListener('click', function(e) {
                e.preventDefault();
                dropdownMenu.style.display = dropdownMenu.style.display === 'block' ? 'none' : 'block';
            });

            document.addEventListener('click', function(e) {
                if (!dropdownLink.contains(e.target) && !dropdownMenu.contains(e.target)) {
                    dropdownMenu.style.display = 'none';
                }
            });
        });
    </script>

</body>

</html>
