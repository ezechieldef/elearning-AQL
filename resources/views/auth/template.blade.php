<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="{{ env('APP_NAME') }}">
    <meta name="description" content="{{ env('APP_NAME') }}">

    <title>{{ env('APP_NAME') }}</title>
    <link rel="canonical" href="/" />
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ url('assets/images/favicon.png') }}">
    <!-- Custom CSS -->
    <link href="{{ url('dist/css/style.min.css') }}" rel="stylesheet">
    {{-- <script src="https://unpkg.com/@lottiefiles/lottie-player@1.5.7/dist/lottie-player.js"></script> --}}
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Style Script">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
    @yield('style')

</head>

<body style="">
    {{-- <lottie-player src="{{ asset('lotties/sun1.json') }}" background="transparent" speed="1"
        style="width: 300px; height: 300px; position:absolute; top:-150px; left:-150px;" loop autoplay></lottie-player>
    <lottie-player src="{{ asset('lotties/sun1.json') }}" background="transparent" speed="1"
        style="width: 300px; height: 300px; position:fixed; bottom:-150px; right:-150px;" loop autoplay></lottie-player> --}}
    <img class="mc-auth-pattern" src="{{ asset('dist/images/backgrounds/pattern.webp') }}" alt="line-pattern">
    <style>
        .mc-auth-pattern {
            width: 100%;
            height: 100%;
            position: absolute;
            top: 0px;
            left: 0px;
            z-index: -1;
            opacity: .08;
        }
    </style>

    {{-- <lottie-player autoplay loop mode="normal"
        src="https://assets3.lottiefiles.com/packages/lf20_qq7lkxtl.json"
        style="position: absolute;
    opacity:0.5;
    top: 0;
    bottom: 0;
    left:0;
    right: 0;
    z-index: -1;">
    </lottie-player> --}}
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    @yield('pre-content')

    <style>
        .form-control {
            background-color: rgba(0, 0, 0, 0.1);
        }

        .form-select {
            background-color: rgba(0, 0, 0, 0.1);
        }
    </style>

    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>


    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->

    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full"
        data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
        <div style="height: 100px;">

        </div>
        {{-- <header class="topbar mb-5 text-center fw-bold" data-navbarbg="" style="font-size: 13px; ">


        </header> --}}
        {{-- <div class="w-100 text-center">
            <h1>
                <span class="text-center  text-dark w-100" style="font-family: Style Script">
                    Rapports
                </span> {{ env('APP_NAME')}}
            </h1>

        </div> --}}

        <div class="">

            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->


            {{-- <div class="background" id="bg-blur" style="position:fixed; min-height: 80vh; filter: blur(25px); background: url('https://bourses.enseignementsuperieur.gouv.bj/images/sampledata/dbsu/IMG_20171031_085951.jpg') ; background-size: cover; "></div> --}}
            <div class="container mt-4">


                <div class="row">
                    {{-- <div class="col-md-4 col-12 text-center">
                        <h1>
                            <span class="text-center  " style="font-family: Style Script">
                                Championnat
                            </span>
                            <br>
                            <span style="font-family: Montserrat;">Foot-Elite</span>


                        </h1>
                        <img src="{{ asset('dist/images/login-security.svg') }}" style="max-height: 60vh"
                            alt="">

                    </div> --}}
                    <div class="col-md-12 col-12" style="min-height: 80vh;">
                        <div class=" text-center py-4 " style="">
                            <div class="card shadow-lg mx-auto my-4" style="max-width: 450px" style="border: none">
                                <div class="card-body">
                                    @yield('content')

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- <div class="d-flex align-items-center " id="bg-gr" style="min-height: 80vh;">

                <div class="container text-center py-4 " style="">
                    <div class="card shadow-lg mx-auto my-4" style="max-width: 450px" style="border: none">
                        <div class="card-body">
                            @yield('content')

                        </div>
                    </div>
                </div>




            </div> --}}

            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="w-100" style="">
                <hr>
                <div class="text-center my-2">
                    {{ env('APP_NAME') }} © COPYRIGTH {{ date('Y') }}
                </div>
                {{-- <div class="row  w-100 p-0 ml-1 d-flex">
                    <div class="col-4 h-10 bg-success">

                    </div>
                    <div class="col-4 h-10 bg-warning">

                    </div>
                    <div class="col-4 bg-danger h-10">

                    </div>
                </div> --}}

            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->


        </div>

    </div>
    <style>
        .sidebar-nav ul .sidebar-item.selected>.sidebar-link {
            /* background: var(--bs-green) #289f61; */
            background: #289f61;
        }

        .text-bold {
            font-weight: 500;
        }

        .text-center {
            text-align: center;
        }

        .h-10 {
            height: 7px;
        }

        .b-vert {
            background-color: #009900
        }

        .b-jaune {
            background-color: #ffff00
        }

        .b-rouge {
            background-color: #ff0000
        }
    </style>



    <script src="{{ asset('dist/libs/jquery/dist/jquery.min.js') }}"></script>

    <script src="{{ asset('dist/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <!-- Bootstrap tether Core JavaScript -->

    {{--
    <!--Wave Effects -->
    <script src="{{ url('dist/js/waves.js') }}"></script>
    <!--Menu sidebar -->
    <script src="{{ url('dist/js/sidebarmenu.js') }}"></script>
    <!--Custom JavaScript -->
    <script src="{{ url('dist/js/custom.js') }}"></script> --}}

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Latest compiled and minified CSS -->

    <style>
        .sidebar-nav ul .sidebar-item.selected>.sidebar-link {
            /* background: var(--bs-green) #289f61; */
            background: #289f61;
        }

        .h-10 {
            height: 7px;
        }

        .b-vert {
            background-color: #009900
        }

        .b-jaune {
            background-color: #ffff00
        }

        .b-rouge {
            background-color: #ff0000
        }
    </style>

    {{-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script> --}}

    {{-- <link rel="stylesheet" href=""> --}}
    @include('auth.show-hide-password')

    @yield('script')
</body>

</html>
