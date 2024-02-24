<!DOCTYPE html>
<html lang="fr">

<head>
    <title> {{ env('APP_NAME') }} </title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{ asset('elearn-master/styles/bootstrap4/bootstrap.min.css') }}">
    <link href="{{ asset('elearn-master/plugins/font-awesome-4.7.0/css/font-awesome.min.css') }}" rel="stylesheet"
        type="text/css">
    <link href="{{ asset('elearn-master/plugins/video-js/video-js.css" rel="stylesheet') }}" type="text/css">
    <link rel="stylesheet" type="text/css" href="{{ asset('elearn-master/styles/courses.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('elearn-master/styles/courses_responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('select2/dist/css/select2.min.css') }}">

    @yield('style')
    @yield('style1')
    @yield('style2')
    @yield('style3')
    @yield('style4')
    @yield('style5')
</head>
<style>
    .form-control {
        background-color: #f5f5f5;
        border-radius: 3px;
    }

    .montserrat {
        font-family: "Montserrat"
    }
</style>

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
        @include('layouts.partials.errors')
        <!-- Courses -->

    </div>
    @yield('content')

    <!-- Footer -->

    @include('layouts.partials.footer')
    </div>

    <script src="{{ asset('elearn-master/js/jquery-3.2.1.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="{{ asset('elearn-master/styles/bootstrap4/popper.js') }}"></script>
    <script src="{{ asset('elearn-master/styles/bootstrap4/bootstrap.min.js') }}"></script>
    <script src="{{ asset('elearn-master/plugins/easing/easing.js') }}"></script>
    <script src="{{ asset('elearn-master/plugins/parallax-js-master/parallax.min.js') }}"></script>
    <script src="{{ asset('elearn-master/js/courses.js') }}"></script>
    <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>

    {{-- Datatable --}}
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
    {{-- https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css --}}

    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.bootstrap.min.css">

    <script src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.3.0/js/responsive.bootstrap.min.js"></script>
    <script>
        $(".datatable").each(function() {
            $(this).DataTable({
                responsive: true,
                language: {
                    "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/French.json"
                },
            });
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    {{-- Select 2 --}}
    <script src="{{ asset('select2/dist/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('select2/dist/js/select2.min.js') }}"></script>
    <script src="{{ asset('select2/select2.init.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.editor').each(function() {
                CKEDITOR.replace($(this).attr('id'));
            });
        });
    </script>
    @yield('script')
    @yield('script1')
    @yield('script2')
    @yield('script3')
    @yield('script4')
    @yield('script5')
</body>

</html>
