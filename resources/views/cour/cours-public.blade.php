@php
    $breadcrumbs = [
        'Cours' => '',
    ];
    $pageTitle = 'Cours disponibles';
@endphp
@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row courses_row">

            <!-- Course -->

            @foreach ($cours as $cour)
                <div class="col-lg-4 col-md-6">
                    <div class="course">

                        <div class=" d-flex justify-content-end align-items-end "
                            style="width: 100%; height: 300px;
                                    background-image:url('{{ asset($cour->Image) }}');

                                    background-size: cover;
                                    background-position: center;">
                        </div>
                        <div class="course_body p-2">
                            <div class="course_header d-flex flex-row align-items-center justify-content-start p-0 m-0">
                                <div class="course_tag"><a href="#"> {{ $cour->category()->first()->Libelle }} </a>
                                </div>
                            </div>
                            <div class="course_title p-0 m-0">
                                <h3><a href="{{ route('cours.show', $cour->id) }}">{{ $cour->Titre }} </a></h3>
                            </div>
                            <div class="course_text m-0 p-0">
                                {{ Str::limit($cour->Description, 50) }}
                            </div>
                            <div class="course_footer d-flex align-items-center justify-content-start p-0 m-0 ">
                                {{-- <div class="course_author_image"><img src="images/featured_author.jpg"
                                        alt="https://unsplash.com/@anthonytran"></div> --}}
                                <div class="course_author_name">By <a href="#">{{ $cour->user()->first()->name }} </a>
                                </div>
                                {{-- <div class="course_sales ml-auto"><span>352</span> Sales</div> --}}
                            </div>
                            <a href="{{ route('cours.show', $cour->id) }}" class="btn btn-dark w-100 mt-2">Suivre le
                                cours</a>
                        </div>
                    </div>
                </div>
            @endforeach



        </div>

        <!-- Pagination -->
        {{-- <div class="row">
            <div class="col">
                <div class="courses_paginations">

                    <ul>
                        <li class="active"><a href="#">01</a></li>
                        <li><a href="#">02</a></li>
                        <li><a href="#">03</a></li>
                        <li><a href="#">04</a></li>
                        <li><a href="#">05</a></li>
                    </ul>
                </div>
            </div>
        </div> --}}
        <div class="">
            <div class="d-flex justify-content-center">
                {!! $cours->links() !!}
            </div>
        </div>
    </div>
@endsection
