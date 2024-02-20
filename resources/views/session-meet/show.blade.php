@extends('layouts.app')

@section('template_title')
    Détails  Session Meet
@endsection

@section('content')
    <section class="">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Session Meet</span>
                        </div>
                        <div class="float-right">
                            <a href="{{ route('session-meets.index') }}" class="btn btn-sm btn-primary"> Retour</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Etudiant Id:</strong>
                            {{ $sessionMeet->etudiant_id }}
                        </div>
                        <div class="form-group">
                            <strong>Datedebut:</strong>
                            {{ $sessionMeet->DateDebut }}
                        </div>
                        <div class="form-group">
                            <strong>Lien:</strong>
                            {{ $sessionMeet->Lien }}
                        </div>
                        <div class="form-group">
                            <strong>Isapproved:</strong>
                            {{ $sessionMeet->isApproved }}
                        </div>
                        <div class="form-group">
                            <strong>Iscompleted:</strong>
                            {{ $sessionMeet->isCompleted }}
                        </div>
                        <div class="form-group">
                            <strong>Isrejected:</strong>
                            {{ $sessionMeet->isRejected }}
                        </div>
                        <div class="form-group">
                            <strong>Motifrejet:</strong>
                            {{ $sessionMeet->MotifRejet }}
                        </div>
                        <div class="form-group">
                            <strong>Status:</strong>
                            {{ $sessionMeet->status }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
