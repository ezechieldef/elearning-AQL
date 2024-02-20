@extends('layouts.app')

@section('template_title')
    Détails  Cour
@endsection

@section('content')
    <section class="">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Cour</span>
                        </div>
                        <div class="float-right">
                            <a href="{{ route('cours.index') }}" class="btn btn-sm btn-primary"> Retour</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Categorie Id:</strong>
                            {{ $cour->categorie_id }}
                        </div>
                        <div class="form-group">
                            <strong>Titre:</strong>
                            {{ $cour->Titre }}
                        </div>
                        <div class="form-group">
                            <strong>Description:</strong>
                            {{ $cour->Description }}
                        </div>
                        <div class="form-group">
                            <strong>Image:</strong>
                            {{ $cour->Image }}
                        </div>
                        <div class="form-group">
                            <strong>Contenu:</strong>
                            {{ $cour->Contenu }}
                        </div>
                        <div class="form-group">
                            <strong>Professeur Id:</strong>
                            {{ $cour->Professeur_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
