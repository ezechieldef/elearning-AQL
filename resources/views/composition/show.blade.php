@extends('layouts.app')

@section('template_title')
    Détails  Composition
@endsection

@section('content')
    <section class="">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Composition</span>
                        </div>
                        <div class="float-right">
                            <a href="{{ route('compositions.index') }}" class="btn btn-sm btn-primary"> Retour</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Suivre Cours Id:</strong>
                            {{ $composition->suivre_cours_id }}
                        </div>
                        <div class="form-group">
                            <strong>Question Id:</strong>
                            {{ $composition->question_id }}
                        </div>
                        <div class="form-group">
                            <strong>Reponse Id:</strong>
                            {{ $composition->reponse_id }}
                        </div>
                        <div class="form-group">
                            <strong>Points:</strong>
                            {{ $composition->Points }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
