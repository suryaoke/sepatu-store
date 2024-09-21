<!DOCTYPE html>
<!--
Template Name: Icewall - HTML Admin Dashboard Template
Author: Left4code
Website: http://www.left4code.com/
Contact: muhammadrizki@left4code.com
Purchase: https://themeforest.net/user/left4code/portfolio
Renew Support: https://themeforest.net/user/left4code/portfolio
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<html lang="en" class="light">
<!-- BEGIN: Head -->

<head>
    <meta charset="utf-8">
    <link href="{{ asset('backend/src/images/logo.svg') }}" rel="shortcut icon">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description"
        content="Icewall admin is super flexible, powerful, clean & modern responsive tailwind admin template with unlimited possibilities.">
    <meta name="keywords"
        content="admin template, Icewall Admin Template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="LEFT4CODE">
    <title>
        @if (request()->routeIs('dashboard'))
            Dashboard
        @elseif (request()->routeIs('brands.all'))
            Brands
        @elseif (request()->routeIs('kategori.all'))
            Kategori
        @elseif (request()->routeIs('sepatu.all'))
            Sepatu
        @elseif (request()->routeIs('transaksi.all'))
            Transaksi
        @elseif (request()->routeIs('report.all'))
            Report
        @elseif (request()->routeIs('akun.pelanggan.all'))
            Akun Pelanggan
        @elseif (request()->routeIs('kontak.all'))
            Kontak
        @elseif (request()->routeIs('tim.all'))
            Tim
        @elseif (request()->routeIs('profile'))
            Profile
        @elseif (request()->routeIs('sepatu.show.create'))
            Sepatu-Create
        @elseif (request()->routeIs('sepatu.show.edit'))
            Sepatu-Edit
        @elseif (request()->routeIs('voucher.all'))
            Voucher
        @endif - SteadyStride
    </title>
    <!-- BEGIN: CSS Assets-->
    <link rel="stylesheet" href="{{ asset('backend/dist/css/app.css') }}" />
    <!-- END: CSS Assets-->
    <script src="//unpkg.com/alpinejs" defer></script>
    <!-- Tambahkan di bagian <head> -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    @livewireStyles
</head>
<!-- END: Head -->

<body class="main">
    @livewireScripts
    <!-- BEGIN: Mobile Menu -->
    <div class="mobile-menu md:hidden">
        <div class="mobile-menu-bar">
            <a href="" class="flex mr-auto">
                <img alt="Midone - HTML Admin Template" class="w-6"
                    src="{{ asset('backend/dist/images/logo.svg') }}">
            </a>
            <a href="javascript:;" class="mobile-menu-toggler"> <i data-lucide="bar-chart-2"
                    class="w-8 h-8 text-white transform -rotate-90"></i> </a>
        </div>
        <div class="scrollable">
            <a href="javascript:;" class="mobile-menu-toggler"> <i data-lucide="x-circle"
                    class="w-8 h-8 text-white transform -rotate-90"></i> </a>
            <ul class="scrollable__content py-2">
                <li>
                    <a href="{{ route('dashboard') }}"
                        class="menu {{ request()->routeIs('dashboard') ? 'menu--active' : (request()->routeIs('profile') ? 'menu--active' : '') }}">
                        <div class="menu__icon"> <i data-lucide="home"></i> </div>
                        <div class="menu__title"> Dashboard</div>
                    </a>
                </li>

                <li>
                    <a href="{{ route('brands.all') }}"
                        class="menu {{ request()->routeIs('brands.all') ? 'menu--active' : '' }}">
                        <div class="menu__icon"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-trello">
                                <rect width="18" height="18" x="3" y="3" rx="2" ry="2" />
                                <rect width="3" height="9" x="7" y="7" />
                                <rect width="3" height="5" x="14" y="7" />
                            </svg> </div>
                        <div class="menu__title"> Brands </div>
                    </a>
                </li>

                <li>
                    <a href="{{ route('kategori.all') }}"
                        class="menu {{ request()->routeIs('kategori.all') ? 'menu--active' : '' }}">
                        <div class="menu__icon"> <i data-lucide="list"></i> </div>
                        <div class="menu__title"> Kategori </div>
                    </a>
                </li>
                <li>
                    <a href="{{ route('sepatu.all') }}"
                        class="menu {{ request()->routeIs('sepatu.all') ? 'menu--active' : '' }}">
                        <div class="menu__icon"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-footprints">
                                <path
                                    d="M4 16v-2.38C4 11.5 2.97 10.5 3 8c.03-2.72 1.49-6 4.5-6C9.37 2 10 3.8 10 5.5c0 3.11-2 5.66-2 8.68V16a2 2 0 1 1-4 0Z" />
                                <path
                                    d="M20 20v-2.38c0-2.12 1.03-3.12 1-5.62-.03-2.72-1.49-6-4.5-6C14.63 6 14 7.8 14 9.5c0 3.11 2 5.66 2 8.68V20a2 2 0 1 0 4 0Z" />
                                <path d="M16 17h4" />
                                <path d="M4 13h4" />
                            </svg> </div>
                        <div class="menu__title"> Sepatu </div>
                    </a>
                </li>

                <li>
                    <a href="{{ route('transaksi.all') }}"
                        class="menu {{ request()->routeIs('transaksi.all') ? 'menu--active' : '' }}">
                        <div class="menu__icon"> <i data-lucide="shopping-bag"></i> </div>
                        <div class="menu__title"> Transaksi </div>
                    </a>
                </li>

                <li>
                    <a href="{{ route('report.all') }}"
                        class="menu {{ request()->routeIs('report.all') ? 'menu--active' : '' }}">
                        <div class="menu__icon"> <i data-lucide="clipboard"></i> </div>
                        <div class="menu__title"> Report </div>
                    </a>
                </li>


                <li>
                    <a href="{{ route('akun.pelanggan.all') }}"
                        class="menu {{ request()->routeIs('akun.pelanggan.all') ? 'menu--active' : '' }}">
                        <div class="menu__icon"> <i data-lucide="users"></i> </div>
                        <div class="menu__title"> Akun Pelanggan </div>
                    </a>
                </li>


                <li>
                    <a href="{{ route('kontak.all') }}"
                        class="menu {{ request()->routeIs('kontak.all') ? 'menu--active' : '' }}">
                        <div class="menu__icon"> <i data-lucide="contact"></i> </div>
                        <div class="menu__title"> Kontak </div>
                    </a>
                </li>

                <li>
                    <a href="{{ route('tim.all') }}"
                        class="menu {{ request()->routeIs('tim.all') ? 'menu--active' : '' }}">
                        <div class="menu__icon"> <i data-lucide="users"></i> </div>
                        <div class="menu__title"> Tim </div>
                    </a>
                </li>




            </ul>
        </div>
    </div>
    <!-- END: Mobile Menu -->

    <!-- BEGIN: Top Bar -->
    @include('backend.body.header')
    <!-- END: Top Bar -->

    <div class="wrapper">
        <div class="wrapper-box">
            <!-- BEGIN: Side Menu -->
            @include('backend.body.sidebar')
            <!-- END: Side Menu -->

            <!-- BEGIN: Content -->
            <div class="content">
                @if (session('success'))
                    <div id="alert-success" class="mt-2 alert alert-success-soft show flex items-center mb-2"
                        role="alert">
                        <i data-lucide="check-circle" class="w-6 h-6 mr-2"></i> {{ session('success') }}
                    </div>
                @endif

                @yield('backend')

            </div>
            <!-- END: Content -->
        </div>
    </div>


    <!-- BEGIN: JS Assets-->
    <script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js">
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=[" your-google-map-api"]&libraries=places"></script>
    <script src="{{ asset('backend/dist/js/app.js') }}"></script>
    <!-- END: JS Assets-->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            setTimeout(function() {
                var alert = document.getElementById('alert-success');
                if (alert) {
                    alert.style.opacity = '0';
                    setTimeout(function() {
                        alert.style.display = 'none';
                    }, 500); // Delay to match opacity transition
                }
            }, 2000); // 2 seconds
        });
    </script>
    <!-- Tambahkan sebelum penutup tag </body> -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#datatable').DataTable({
                // Anda bisa menambahkan opsi konfigurasi DataTable di sini jika perlu
                "paging": true, // Mengaktifkan fitur paging
                "searching": true, // Mengaktifkan fitur pencarian
                "info": true // Menampilkan informasi tabel
            });
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#image,#image2').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showImage,#showImage2').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>


</body>

</html>
