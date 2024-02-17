<!DOCTYPE html>
<html lang="fr">

<head>
    <title> {{ env('APP_NAME') }} </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="{{ asset('studylab-main/css/animate.css') }}">

    <link rel="stylesheet" href="{{ asset('studylab-main/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('studylab-main/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('studylab-main/css/magnific-popup.css') }}">

    <link rel="stylesheet" href="{{ asset('studylab-main/css/bootstrap-datepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('studylab-main/css/jquery.timepicker.css') }}">


    <link rel="stylesheet" href="{{ asset('studylab-main/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('studylab-main/css/style.css') }}">
    @yield('style')
    @yield('style1')
    @yield('style2')
    @yield('style3')
    @yield('style4')
    @yield('style5')
</head>

<body>
    @include('layouts.partials.navbar')
    <!-- END nav -->

    @include('layouts.partials.banner')
    <section>
        @yield('content')
    </section>


    @include('layouts.partials.footer')



    <!-- loader -->
    <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
            <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4"
                stroke="#eeeeee" />
            <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4"
                stroke-miterlimit="10" stroke="#F96D00" />
        </svg></div>


    <script src="{{ asset('studylab-main/js/jquery.min.js') }}"></script>
    <script src="{{ asset('studylab-main/js/jquery-migrate-3.0.1.min.js') }}"></script>
    <script src="{{ asset('studylab-main/js/popper.min.js') }}"></script>
    <script src="{{ asset('studylab-main/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('studylab-main/js/jquery.easing.1.3.js') }}"></script>
    <script src="{{ asset('studylab-main/js/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('studylab-main/js/jquery.stellar.min.js') }}"></script>
    <script src="{{ asset('studylab-main/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('studylab-main/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('studylab-main/js/jquery.animateNumber.min.js') }}"></script>
    <script src="{{ asset('studylab-main/js/bootstrap-datepicker.js') }}"></script>
    <script src="{{ asset('studylab-main/js/scrollax.min.js') }}"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
    <script src="{{ asset('studylab-main/js/google-map.js') }}"></script>
    <script src="{{ asset('studylab-main/js/main.js') }}"></script>
    @yield('script')
    @yield('script1')
    @yield('script2')
    @yield('script3')
    @yield('script4')
    @yield('script5')

</body>

</html>
