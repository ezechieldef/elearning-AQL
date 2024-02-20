@extends('layouts.app')

@section('template_title')
    Détails  Reponse
@endsection

@section('content')
    <section class="">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Reponse</span>
                        </div>
                        <div class="float-right">
                            <a href="{{ route('reponses.index') }}" class="btn btn-sm btn-primary"> Retour</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Question Id:</strong>
                            {{ $reponse->question_id }}
                        </div>
                        <div class="form-group">
                            <strong>Libelle:</strong>
                            {{ $reponse->Libelle }}
                        </div>
                        <div class="form-group">
                            <strong>Iscorrect:</strong>
                            {{ $reponse->isCorrect }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
