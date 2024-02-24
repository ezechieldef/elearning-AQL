@php
    $breadcrumbs = [
        $liveDisponible->Titre => '',
    ];
    $pageTitle = $liveDisponible->Titre;
@endphp
@extends('layouts.app')

@section('content')
    <section class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">


                    <div class="card-body">
                        <h1>
                            {{ $liveDisponible->Titre }}
                        </h1>
                        <hr>
                        {!! $liveDisponible->Description !!}

                        @role('ETUDIANT')
                            <div class="text-end">
                                <a href="{{ route('live-disponible.inscription', $liveDisponible->id) }}"
                                    class="btn btn-sm btn-primary"> S'inscrire / Prendre Rendez-vous</a>

                            </div>
                        @endrole
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
