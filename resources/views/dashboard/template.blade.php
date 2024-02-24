@php
    $breadcrumbs = $breadcrumbs ?? [
        'Tableau de board' => '/dashboard',
    ];
    $pageTitle = $pageTitle ?? 'Tableau de board';
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

                    @if (!is_null(Auth::user()))
                        {{-- Liste des menu pour professeur --}}
                        @if (Auth::user()->estUnProfesseur())
                            <ul class="nav nav-pills flex-column mb-auto">
                                <li class="nav-item">
                                    <a href="{{ route('dashboard') }}"
                                        class="nav-link  {{ Request::is('dashboard') ? 'active' : '' }}"
                                        aria-current="page">
                                        <i class="fa fa-plus me-3"></i>
                                        Tableau de board
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('cours.index') }}"
                                        class="nav-link {{ Request::is('cours') ? 'active' : '' }} " aria-current="page">
                                        <i class="fa fa-plus me-3"></i>
                                        Mes cours
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('cours.create') }}"
                                        class="nav-link {{ Request::is('cours/create*') ? 'active' : '' }}"
                                        aria-current="page">
                                        <i class="fa fa-plus me-3"></i>
                                        Ajouter un cours
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('proposition-live.index') }}"
                                        class="nav-link {{ Request::is('proposition-live') ? 'active' : '' }} "
                                        aria-current="page">
                                        <i class="fa fa-plus me-3"></i>
                                        Cours Live Proposé(s) (Séance en direct)
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('proposition-live.create') }}"
                                        class="nav-link  {{ Request::is('proposition-live/create*') ? 'active' : '' }}"
                                        aria-current="page">
                                        <i class="fa fa-plus me-3"></i>
                                        Proposer Cours Live (Séance en direct)
                                    </a>
                                </li>

                            </ul>
                        @endif
                        {{-- Liste des menu pour étudiant --}}
                        @if (Auth::user()->estUnEtudiant())
                            <ul class="nav nav-pills flex-column mb-auto">
                                <li class="nav-item">
                                    <a href="#" class="nav-link active" aria-current="page">
                                        <i class="fa fa-plus me-3"></i>
                                        Mes cours
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link " aria-current="page">
                                        <i class="fa fa-plus me-3"></i>
                                        Mes certificats de success
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link" aria-current="page">
                                        <i class="fa fa-plus me-3"></i>
                                        Mes Rendez-vous Live
                                    </a>
                                </li>
                            </ul>
                        @endif
                        {{-- Liste des menu pour Administrateur --}}
                        @if (Auth::user()->estUnAdministrateur())
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
                    @endif


                    @yield('dashboard-menu')

                </div>
            </div>
            <div class="col-md-9 col-12">
                @yield('dashboard-content')
                {{-- @yield('content') --}}
            </div>
        </div>
    </div>
@endsection
