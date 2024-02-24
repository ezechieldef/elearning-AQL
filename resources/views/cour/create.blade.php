@extends('dashboard.template')

@section('dashboard-content')
    <section class="">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default  border">

                    <div class="card-body">
                        <div class="text-end">
                            <a href="{{ route('cours.index') }}" class="btn btn-sm btn-primary"> Retour</a>
                        </div>
                        <div class="col mb-2">

                            <span>Formulaire d'ajout d'un Cours</span>
                            <hr>
                        </div>
                        <div class="container-fluid">

                            <form method="POST" action="{{ route('cours.store') }}" role="form"
                                enctype="multipart/form-data">
                                @csrf

                                @include('cour.form')

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
