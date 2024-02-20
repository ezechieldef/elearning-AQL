@extends('layouts.app')

@section('template_title')
    Formulaire de modification: Suivre Cour
@endsection

@section('content')
    <section class="">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">

                    <div class="card-body">
                        <div class="text-end">
                            <a href="{{ route('suivre-cours.index') }}" class="btn btn-sm btn-primary"> Retour</a>
                        </div>
                        <div class="col mb-2">
                            <h5 class="card-title text-dark fw-bolder mb-0">Mettre à jour Suivre Cour</h5>
                            <span>Formulaire de modification: Suivre Cour</span>
                            <hr>
                        </div>
                        <form method="POST" action="{{ route('suivre-cours.update', $suivreCour->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('suivre-cour.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
