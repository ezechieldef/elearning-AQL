@extends('dashboard.template')
@section('dashboard-menu')
@endsection
@section('dashboard-content')
    <h1>Erreur</h1>
    <p>Une erreur est survenue. Veuillez réessayer plus tard.</p>
    @if(config('app.debug'))
        <div class="alert alert-danger">
            <p>{{ $exception->getMessage() }}</p>
        </div>
    @endif
@endsection
