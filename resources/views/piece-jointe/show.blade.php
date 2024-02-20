@extends('layouts.app')

@section('template_title')
    Détails  Piece Jointe
@endsection

@section('content')
    <section class="">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Piece Jointe</span>
                        </div>
                        <div class="float-right">
                            <a href="{{ route('piece-jointes.index') }}" class="btn btn-sm btn-primary"> Retour</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nom:</strong>
                            {{ $pieceJointe->Nom }}
                        </div>
                        <div class="form-group">
                            <strong>Adresse:</strong>
                            {{ $pieceJointe->Adresse }}
                        </div>
                        <div class="form-group">
                            <strong>Cours Id:</strong>
                            {{ $pieceJointe->cours_id }}
                        </div>
                        <div class="form-group">
                            <strong>Type:</strong>
                            {{ $pieceJointe->Type }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
