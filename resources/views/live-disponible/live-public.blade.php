@php
    $breadcrumbs = [
        'Seance live' => '',
    ];
    $pageTitle = 'Seance live';
@endphp
@extends('layouts.app')
@section('content')
    <div class="container">

        @foreach ($lives as $live)
            <div class="col-lg-6 col-12">
                <div class="course rounded-1">


                    <div class="course_body rounded p-3">
                        <div class="d-flex">
                            <div class="me-2">
                                <div class=" d-flex justify-content-end align-items-end rounded-circle"
                                    style="width: 70px; height: 70px;
                                    background-image:url('{{ /*Mettre le lien du profil*/ '' }}');
                                    background-color: rgba(0, 0, 0, 0.2);

                                    background-size: cover;
                                    background-position: center;">
                                </div>
                            </div>
                            <div class="">
                                <div class="course_title p-0 m-0">
                                    <h3><a href="{{ route('proposition-live.show', $live->id) }}">{{ $live->Titre }} </a>
                                    </h3>
                                </div>
                            </div>
                        </div>
                        <div class="course_header d-flex flex-row align-items-center justify-content-end p-0 m-0">
                            <div class="course_tag"><a href="#"> {{ $live->category()->first()->Libelle }} </a>
                            </div>
                        </div>

                        <div class="course_text m-0 p-0">
                            {!! strip_tags(Str::limit($live->Description, 50)) !!}
                        </div>
                        <div class="course_footer d-flex align-items-center justify-content-start p-0 m-0 ">
                            {{-- <div class="course_author_image"><img src="images/featured_author.jpg"
                                        alt="https://unsplash.com/@anthonytran"></div> --}}
                            <div class="course_author_name">By <a href="#">{{ $live->user()->first()->name }} </a>
                            </div>
                            {{-- <div class="course_sales ml-auto"><span>352</span> Sales</div> --}}
                        </div>
                        <a href="{{ route('proposition-live.show', $live->id) }}" class="btn btn-dark w-100 mt-2"> En savoir
                            plus / Prendre
                            Rendez-vous</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
