@extends('layouts.app')

@section('template_title')
    Détails  Avis Utilisateur
@endsection

@section('content')
    <section class="">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Avis Utilisateur</span>
                        </div>
                        <div class="float-right">
                            <a href="{{ route('avis-utilisateurs.index') }}" class="btn btn-sm btn-primary"> Retour</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>User Id:</strong>
                            {{ $avisUtilisateur->user_id }}
                        </div>
                        <div class="form-group">
                            <strong>Cours Id:</strong>
                            {{ $avisUtilisateur->cours_id }}
                        </div>
                        <div class="form-group">
                            <strong>Session Meet Id:</strong>
                            {{ $avisUtilisateur->session_meet_id }}
                        </div>
                        <div class="form-group">
                            <strong>Note:</strong>
                            {{ $avisUtilisateur->Note }}
                        </div>
                        <div class="form-group">
                            <strong>Commentaire:</strong>
                            {{ $avisUtilisateur->Commentaire }}
                        </div>
                        <div class="form-group">
                            <strong>Isread:</strong>
                            {{ $avisUtilisateur->isRead }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
