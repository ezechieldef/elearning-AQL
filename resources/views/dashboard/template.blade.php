@php
    $breadcrumbs = [
        'Tableau de board' => '/dashboard',
    ];
    $pageTitle = 'Tableau de board';
@endphp
@extends('layouts.app')

@section('content')
    <div class="container-fluid">
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

                    {{-- Liste des menu pour professeur --}}
                    @if ($user->estUnProfesseur())
                        <ul class="nav nav-pills flex-column mb-auto">
                            <li class="nav-item">
                                <a href="#" class="nav-link active" aria-current="page">
                                    <i class="fa fa-plus me-3"></i>
                                    Un menu pour Professeur
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link" aria-current="page">
                                    <i class="fa fa-plus me-3"></i>
                                    Un Autre
                                </a>
                            </li>

                        </ul>
                    @endif
                    {{-- Liste des menu pour étudiant --}}
                    @if ($user->estUnEtudiant())
                        <ul class="nav nav-pills flex-column mb-auto">
                            <li class="nav-item">
                                <a href="#" class="nav-link active" aria-current="page">
                                    <i class="fa fa-plus me-3"></i>
                                    Un menu pour Etudiant
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link" aria-current="page">
                                    <i class="fa fa-plus me-3"></i>
                                    Un Autre pour Etudiant
                                </a>
                            </li>
                        </ul>
                    @endif
                    {{-- Liste des menu pour Administrateur --}}
                    @if ($user->estUnAdministrateur())
                        <ul class="nav nav-pills flex-column mb-auto">
                            <li class="nav-item">
                                <a href="#" class="nav-link active" aria-current="page">
                                    <i class="fa fa-plus me-3"></i>
                                    Un menu pour Etudiant
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link" aria-current="page">
                                    <i class="fa fa-plus me-3"></i>
                                    Un Autre pour Etudiant
                                </a>
                            </li>
                        </ul>
                    @endif

                    @yield('dashboard-menu')
                </div>
            </div>
            <div class="col-md-9 col-12">
                @yield('dashboard-content')

            </div>
        </div>
    </div>
@endsection
