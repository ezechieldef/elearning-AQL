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
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default  border">

                    <div class="card-body">
                        <div class="text-end">
                            <a href="{{ route('proposition-live.index') }}" class="btn btn-sm btn-primary"> Retour</a>
                        </div>
                        <div class="col mb-2">

                            <span>Formulaire de proposition de Live</span>
                            <hr>
                        </div>
                        <div class="container-fluid">


                            <form method="POST" action="{{ route('proposition-live.store') }}" role="form"
                                enctype="multipart/form-data">
                                @csrf

                                @include('live-disponible.form')

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
