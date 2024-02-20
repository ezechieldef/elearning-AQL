@extends('layouts.app')

@section('template_title')
    Détails  Category
@endsection

@section('content')
    <section class="">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Category</span>
                        </div>
                        <div class="float-right">
                            <a href="{{ route('categories.index') }}" class="btn btn-sm btn-primary"> Retour</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Libelle:</strong>
                            {{ $category->Libelle }}
                        </div>
                        <div class="form-group">
                            <strong>Description:</strong>
                            {{ $category->Description }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
