@extends('layouts.app')

@section('template_title')
    Détails  Participant
@endsection

@section('content')
    <section class="">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Participant</span>
                        </div>
                        <div class="float-right">
                            <a href="{{ route('participants.index') }}" class="btn btn-sm btn-primary"> Retour</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>User Id:</strong>
                            {{ $participant->user_id }}
                        </div>
                        <div class="form-group">
                            <strong>Session Meet Id:</strong>
                            {{ $participant->session_meet_id }}
                        </div>
                        <div class="form-group">
                            <strong>Isprofessor:</strong>
                            {{ $participant->isProfessor }}
                        </div>
                        <div class="form-group">
                            <strong>Ispresent:</strong>
                            {{ $participant->isPresent }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
