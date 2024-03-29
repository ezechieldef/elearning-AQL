@extends('dashboard.template')

@section('dashboard-content')
    <section class="">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">

                    <div class="card-body">
                        <div class="text-end">
                            <a href="{{ route('cours.index') }}" class="btn btn-sm btn-primary"> Retour</a>
                        </div>
                        <div class="col mb-2">

                            <span>Formulaire de modification d'un Cours</span>
                            <hr>
                        </div>
                        <div class="container-fluid">
                            <form method="POST" action="{{ route('cours.update', $cour->id) }}" role="form"
                                enctype="multipart/form-data">
                                {{ method_field('PATCH') }}
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
