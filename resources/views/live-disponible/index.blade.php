@php
    $breadcrumbs = [
        'Tableau de board' => '/dashboard',
        'Live Proposé' => '',
    ];
    $pageTitle = 'Liste des Live Proposés';
@endphp
@extends('dashboard.template')
@section('dashboard-content')
    <div class="">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">



                    <div class="card-body">
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success">
                                <p>{{ $message }}</p>
                            </div>
                        @endif

                        <div class="text-end mb-3">
                            <a href="{{ route('proposition-live.create') }}" class="btn btn-sm btn-primary"> Nouveau</a>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-striped table-hover datatable">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>


                                        <th>Statut</th>
                                        <th>Categorie</th>
                                        <th>Titre</th>
                                        {{-- <th>Description</th> --}}

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($liveDisponibles as $liveDisponible)
                                        <tr>
                                            <td>{{ ++$i }}</td>

                                            {{-- <td>{{ $liveDisponible->professeur_id }}</td> --}}
                                            <td class="{{ $liveDisponible->isPublished ? 'text-success' : 'text-danger' }}">
                                                {{ $liveDisponible->getStatutStr() }}</td>
                                            <td>{{ $liveDisponible->category()->first()->Libelle }}</td>
                                            <td title="{{ $liveDisponible->Titre }}">
                                                {{ Str::limit($liveDisponible->Titre, 50) }}</td>
                                            {{-- <td>{{ $liveDisponible->Description }}</td> --}}

                                            <td>
                                                <div class="dropdown">
                                                    <button class="btn btn-primary dropdown-toggle btn-sm" type="button"
                                                        id="dropdownMenuButton" data-bs-toggle="dropdown"
                                                        aria-haspopup="true" aria-expanded="false">
                                                        Actions
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                        <a class="dropdown-item"
                                                            href="{{ route('proposition-live.show', $liveDisponible->id) }}"><i
                                                                class="fa fa-fw fa-eye"></i> {{ __('Voir') }}</a>
                                                        <a class="dropdown-item"
                                                            href="{{ route('proposition-live.edit', $liveDisponible->id) }}"><i
                                                                class="fa fa-fw fa-edit"></i> {{ __('Modifier') }}</a>
                                                        <a class="dropdown-item"
                                                            href="{{ route('proposition-live.publish', $liveDisponible->id) }}"><i
                                                                class="fa fa-fw {{ $liveDisponible->isPublished ? 'fa-close' : 'fa-check' }}"></i>
                                                            {{ $liveDisponible->isPublished ? 'Dépublier le cours' : 'Publier le cours' }}</a>
                                                        <div class="dropdown-divider"></div>
                                                        <form
                                                            action="{{ route('proposition-live.destroy', $liveDisponible->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="dropdown-item text-danger"><i
                                                                    class="fa fa-fw fa-trash"></i>
                                                                {{ __('Supprimer') }}</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $liveDisponibles->links() !!}
            </div>
        </div>
    </div>
@endsection
