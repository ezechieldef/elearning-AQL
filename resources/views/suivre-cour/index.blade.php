@extends('layouts.app')

@section('template_title')
    Liste Suivre Cour
@endsection

@section('content')
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

                        <div class="text-end">
                            <a href="{{ route('suivre-cours.create') }}" class="btn btn-sm btn-primary"> Nouveau</a>
                        </div>
                        <div class="col mb-2">
                            <h5 class="card-title text-dark fw-bolder mb-0">Suivre Cour(s)</h5>
                            <span>Liste des  Suivre Cour</span>
                            <hr>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped table-hover datatable">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th>Cours Id</th>
										<th>Etudiant Id</th>
										<th>Iscompleted</th>
										<th>Note</th>
										<th>Dateinscription</th>
										<th>Datedebutcomposition</th>
										<th>Datecompletion</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($suivreCours as $suivreCour)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $suivreCour->cours_id }}</td>
											<td>{{ $suivreCour->etudiant_id }}</td>
											<td>{{ $suivreCour->isCompleted }}</td>
											<td>{{ $suivreCour->Note }}</td>
											<td>{{ $suivreCour->DateInscription }}</td>
											<td>{{ $suivreCour->DateDebutComposition }}</td>
											<td>{{ $suivreCour->DateCompletion }}</td>

                                            <td>
                                                <div class="dropdown">
                                                    <button class="btn btn-primary dropdown-toggle btn-sm" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        Actions
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                        <a class="dropdown-item" href="{{ route('suivre-cours.show',$suivreCour->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Voir') }}</a>
                                                        <a class="dropdown-item" href="{{ route('suivre-cours.edit',$suivreCour->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Modifier') }}</a>
                                                        <div class="dropdown-divider"></div>
                                                        <form action="{{ route('suivre-cours.destroy',$suivreCour->id) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="dropdown-item text-danger"><i class="fa fa-fw fa-trash"></i> {{ __('Supprimer') }}</button>
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
                {!! $suivreCours->links() !!}
            </div>
        </div>
    </div>
@endsection
