<!DOCTYPE html>
<html lang="fr">

<head>
    <title> {{ env('APP_NAME') }} </title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="{{ asset('elearn-master/styles/bootstrap4/bootstrap.min.css') }}">
    <link href="{{ asset('elearn-master/plugins/font-awesome-4.7.0/css/font-awesome.min.css') }}" rel="stylesheet"
        type="text/css">
    <link href="{{ asset('elearn-master/plugins/video-js/video-js.css" rel="stylesheet') }}" type="text/css">
    <link rel="stylesheet" type="text/css" href="{{ asset('elearn-master/styles/courses.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('elearn-master/styles/courses_responsive.css') }}">
    @yield('style')
    @yield('style1')
    @yield('style2')
    @yield('style3')
    @yield('style4')
    @yield('style5')
</head>

<body>

    <div class="super_container">

        <!-- Header -->

        <header class="header">

            <!-- Top Bar -->
            @include('layouts.partials.topbar')

            <!-- Header Content -->
            @include('layouts.partials.header')

            <!-- Header Search Panel -->
            <div class="header_search_container">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="header_search_content d-flex flex-row align-items-center justify-content-end">
                                <form action="#" class="header_search_form">
                                    <input type="search" class="search_input" placeholder="Search" required="required">
                                    <button
                                        class="header_search_button d-flex flex-column align-items-center justify-content-center">
                                        <i class="fa fa-search" aria-hidden="true"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!-- Menu -->


        <!-- Home -->
        @if (!($withoutBanner ?? false))
            @include('layouts.partials.banner')
        @else
            <div style="height: 70px;">
        @endif
        <!-- Courses -->

    </div>
    @yield('content')

    <!-- Footer -->

    @include('layouts.partials.footer')
    </div>

    <script src="{{ asset('elearn-master/js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('elearn-master/styles/bootstrap4/popper.js') }}"></script>
    <script src="{{ asset('elearn-master/styles/bootstrap4/bootstrap.min.js') }}"></script>
    <script src="{{ asset('elearn-master/plugins/easing/easing.js') }}"></script>
    <script src="{{ asset('elearn-master/plugins/parallax-js-master/parallax.min.js') }}"></script>
    <script src="{{ asset('elearn-master/js/courses.js') }}"></script>
    @yield('script')
    @yield('script1')
    @yield('script2')
    @yield('script3')
    @yield('script4')
    @yield('script5')
</body>

</html>
