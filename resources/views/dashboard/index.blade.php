@php
    $breadcrumbs = [
        'Tableau de board' => '/dashboard',
    ];
    $pageTitle = 'Tableau de board';
@endphp
@extends('layouts.app')

@section('content')
    <div class="">
        <div class="row">


            <div class="col-md-3 col-12">
                <div class="p-3 text-dark" style="min-height: 100vh;">
                    <a href="/" class="">

                        <span class="h5 text-dark fw-bolder"></span>
                        <h5 style="font-weight: 600">
                            <i class="fa fa-book me-5 "></i>
                            <span>

                                Tableau de board
                            </span>
                        </h5>

                    </a>
                    <hr>
                    @if ($user->estUnProfesseur())
                        <ul class="nav nav-pills flex-column mb-auto">
                            <li class="nav-item">
                                <a href="#" class="nav-link active" aria-current="page">
                                    <i class="fa fa-plus me-3"></i>
                                    Ajouter un cours
                                </a>
                            </li>

                        </ul>
                    @endif

                    @if ($user->estUnEtudiant())
                        <ul class="nav nav-pills flex-column mb-auto">
                            <li class="nav-item">
                                <a href="#" class="nav-link active" aria-current="page">
                                    <svg class="bi me-2" width="16" height="16">
                                        <use xlink:href="#home"></use>
                                    </svg>
                                    Menu de Etudiant
                                </a>
                            </li>

                        </ul>
                    @endif


                </div>
            </div>
            <div class="col-md-10 col-12">


            </div>
        </div>
    </div>
@endsection
