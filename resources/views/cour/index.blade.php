@php
    $breadcrumbs = [
        'Tableau de board' => '/dashboard',
        'Cours' => '/cours',
    ];
    $pageTitle = 'Liste de mes cours';
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

                        <div class="d-flex justify-content-end  text-end mb-3">
                            <a href="{{ route('cours.create') }}" class="btn btn-sm btn-success"> <i
                                    class="fa fa-plus me-3"></i> Nouveau</a>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-striped table-hover datatable">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>

                                        <th>Categorie</th>
                                        <th></th>


                                        <th>Statut</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($cours as $cour)
                                        <tr>
                                            <td>{{ ++$i }}</td>

                                            <td>{{ $cour->category()->first()->Libelle }}</td>
                                            <td>
                                                <div class="d-flex">
                                                    <div class="me-2">
                                                        <img src="{{ asset($cour->Image) }}" width="50" height="50"
                                                            class="rounded-circle" alt="">
                                                    </div>
                                                    <div class="col">
                                                        <div class="fw-bold">{{ $cour->Titre }}</div>
                                                        <div class="text-muted"> {{ Str::limit($cour->Description, 50) }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="{{ $cour->isPublished ? 'text-success' : 'text-danger' }} ">
                                                    {{ $cour->etat() }}

                                                </div>
                                            </td>



                                            <td>
                                                <div class="dropdown">
                                                    <button class="btn btn-primary dropdown-toggle btn-sm" type="button"
                                                        id="dropdownMenuButton" data-bs-toggle="dropdown"
                                                        aria-haspopup="true" aria-expanded="false">
                                                        Actions
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                        <a class="dropdown-item"
                                                            href="{{ route('cours.show', $cour->id) }}"><i
                                                                class="fa fa-fw fa-eye"></i> {{ __('Voir') }}</a>
                                                        <a class="dropdown-item"
                                                            href="{{ route('cours.edit', $cour->id) }}"><i
                                                                class="fa fa-fw fa-edit"></i> {{ __('Modifier') }}</a>
                                                        <a class="dropdown-item" href="#"><i
                                                                class="fa fa-fw fa-question"></i>
                                                            {{ __('Editer Questionnaire') }}</a>
                                                        <a class="dropdown-item"
                                                            href="{{ route('cours.publish', $cour->id) }}"><i
                                                                class="fa fa-fw {{ $cour->isPublished ? 'fa-close' : 'fa-check' }}"></i>
                                                            {{ $cour->isPublished ? 'Dépublier le cours' : 'Publier le cours' }}</a>

                                                        <div class="dropdown-divider"></div>
                                                        <form action="{{ route('cours.destroy', $cour->id) }}"
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
                {!! $cours->links() !!}
            </div>
        </div>
    </div>
@endsection
