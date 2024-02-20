@extends('layouts.app')

@section('template_title')
    Détails  Suivre Cour
@endsection

@section('content')
    <section class="">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Suivre Cour</span>
                        </div>
                        <div class="float-right">
                            <a href="{{ route('suivre-cours.index') }}" class="btn btn-sm btn-primary"> Retour</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Cours Id:</strong>
                            {{ $suivreCour->cours_id }}
                        </div>
                        <div class="form-group">
                            <strong>Etudiant Id:</strong>
                            {{ $suivreCour->etudiant_id }}
                        </div>
                        <div class="form-group">
                            <strong>Iscompleted:</strong>
                            {{ $suivreCour->isCompleted }}
                        </div>
                        <div class="form-group">
                            <strong>Note:</strong>
                            {{ $suivreCour->Note }}
                        </div>
                        <div class="form-group">
                            <strong>Dateinscription:</strong>
                            {{ $suivreCour->DateInscription }}
                        </div>
                        <div class="form-group">
                            <strong>Datedebutcomposition:</strong>
                            {{ $suivreCour->DateDebutComposition }}
                        </div>
                        <div class="form-group">
                            <strong>Datecompletion:</strong>
                            {{ $suivreCour->DateCompletion }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
