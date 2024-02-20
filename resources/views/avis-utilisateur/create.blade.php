@extends('layouts.app')

@section('template_title')
    Nouveau Avis Utilisateur
@endsection

@section('content')
    <section class="">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default  border">

                    <div class="card-body">
                        <div class="text-end">
                            <a href="{{ route('avis-utilisateurs.index') }}" class="btn btn-sm btn-primary"> Retour</a>
                        </div>
                        <div class="col mb-2">
                            <h5 class="card-title text-dark fw-bolder mb-0">Nouveau : Avis Utilisateur</h5>
                            <span>Formulaire d'ajout d'un(e)  Avis Utilisateur</span>
                            <hr>
                        </div>
                        <form method="POST" action="{{ route('avis-utilisateurs.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('avis-utilisateur.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
