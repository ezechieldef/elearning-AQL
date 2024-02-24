@php
    $breadcrumbs = [
        'Tableau de board' => '/dashboard',
        'Live Proposé' => route('proposition-live.index'),
        'Nouveau Live' => '',
    ];
    $pageTitle = 'Proposer Cours Live (Séance en direct)';
@endphp
@extends('dashboard.template')
@section('dashboard-content')
    <section class="">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">

                    <div class="card-body">
                        <div class="text-end">
                            <a href="{{ route('proposition-live.index') }}" class="btn btn-sm btn-primary"> Retour</a>
                        </div>
                        <div class="col mb-2">
                            <h5 class="card-title text-dark fw-bolder mb-0">Mettre à jour Live Disponible</h5>
                            <span>Formulaire de modification: Live Disponible</span>
                            <hr>
                        </div>
                        <form method="POST" action="{{ route('proposition-live.update', $liveDisponible->id) }}"
                            role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('live-disponible.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
