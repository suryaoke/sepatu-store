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
    <link href="{{ asset('backend/dist/images/logo.svg') }}" rel="shortcut icon">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description"
        content="Icewall admin is super flexible, powerful, clean & modern responsive tailwind admin template with unlimited possibilities.">
    <meta name="keywords"
        content="admin template, Icewall Admin Template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="LEFT4CODE">
    <title>Register - SteadyStride</title>
    <!-- BEGIN: CSS Assets-->
    <link rel="stylesheet" href="{{ asset('backend/dist/css/app.css') }}" />
    <!-- END: CSS Assets-->
</head>
<!-- END: Head -->

<body class="login">
    <div class="container sm:px-10">
        <div class="block xl:grid grid-cols-2 gap-4">
            <!-- BEGIN: Register Info -->
            <div class="hidden xl:flex flex-col min-h-screen">
                <a href="" class="-intro-x flex items-center pt-5">
                    <img alt="Midone - HTML Admin Template" class="w-10"
                        src="{{ asset('backend/src/images/logo.svg') }}">
                    <span class="text-white text-lg ml-3"> SteadyStride</span>
                </a>
                <div class="my-auto">
                    <img style="width: 450px" alt="Midone - HTML Admin Template" class="-intro-x  -mt-16"
                        src="{{ asset('backend/src/images/illustration.svg') }}">
                    <div class="-intro-x text-white font-medium text-4xl leading-tight mt-10">
                        Langkah Pasti, <br> Gaya Terdepan!
                    </div>
                    <div class="-intro-x mt-5 text-lg text-white text-opacity-70 dark:text-slate-400">
                        Temukan koleksi
                        sepatu terbaru di Steady Stride <br> dan ciptakan
                        jejakmu dengan percaya diri
                    </div>
                </div>
            </div>
            <!-- END: Register Info -->
            <!-- BEGIN: Register Form -->
            <div class="h-screen xl:h-auto flex py-5 xl:py-0 my-10 xl:my-0">
                <div
                    class="my-auto mx-auto xl:ml-20 bg-white dark:bg-darkmode-600 xl:bg-transparent px-5 sm:px-8 py-8 xl:p-0 rounded-md shadow-md xl:shadow-none w-full sm:w-3/4 lg:w-2/4 xl:w-auto">
                    <h2 class="intro-x font-bold text-2xl xl:text-3xl text-center xl:text-left">
                        Register
                    </h2>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="intro-x mt-8">
                            <input type="text" name="name"
                                class="intro-x login__input form-control py-3 px-4 block" placeholder="Name">
                            <input type="email" name="email"
                                class="intro-x login__input form-control py-3 px-4 block mt-4" placeholder="Email">
                            <input type="password" name="password"
                                class="intro-x login__input form-control py-3 px-4 block mt-4" placeholder="Password">

                            <input type="password" name="password_confirmation" required autocomplete="new-password"
                                class="intro-x login__input form-control py-3 px-4 block mt-4"
                                placeholder="Password Confirmation">
                        </div>

                        <div class="intro-x mt-5 xl:mt-8 text-center xl:text-left">
                            <button type="submit"
                                class="btn btn-primary py-3 px-4 w-full xl:w-32 xl:mr-3 align-top">Register</button>
                            <a href="{{ route('login') }}"
                                class="btn btn-outline-secondary py-3 px-4 w-full xl:w-32 mt-3 xl:mt-0 align-top">Login</a>
                        </div>
                    </form>
                </div>

            </div>
            <!-- END: Register Form -->
        </div>
    </div>


    <!-- BEGIN: JS Assets-->
    <script src="{{ asset('backend/dist/js/app.js') }}"></script>
    <!-- END: JS Assets-->
</body>

</html>
