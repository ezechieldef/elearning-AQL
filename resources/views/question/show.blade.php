@extends('layouts.app')

@section('template_title')
    Détails  Question
@endsection

@section('content')
    <section class="">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Question</span>
                        </div>
                        <div class="float-right">
                            <a href="{{ route('questions.index') }}" class="btn btn-sm btn-primary"> Retour</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Cours Id:</strong>
                            {{ $question->cours_id }}
                        </div>
                        <div class="form-group">
                            <strong>Libelle:</strong>
                            {{ $question->Libelle }}
                        </div>
                        <div class="form-group">
                            <strong>Point:</strong>
                            {{ $question->Point }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
