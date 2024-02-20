@extends('layouts.app')

@section('template_title')
    Liste Avis Utilisateur
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
                            <a href="{{ route('avis-utilisateurs.create') }}" class="btn btn-sm btn-primary"> Nouveau</a>
                        </div>
                        <div class="col mb-2">
                            <h5 class="card-title text-dark fw-bolder mb-0">Avis Utilisateur(s)</h5>
                            <span>Liste des  Avis Utilisateur</span>
                            <hr>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped table-hover datatable">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th>User Id</th>
										<th>Cours Id</th>
										<th>Session Meet Id</th>
										<th>Note</th>
										<th>Commentaire</th>
										<th>Isread</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($avisUtilisateurs as $avisUtilisateur)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $avisUtilisateur->user_id }}</td>
											<td>{{ $avisUtilisateur->cours_id }}</td>
											<td>{{ $avisUtilisateur->session_meet_id }}</td>
											<td>{{ $avisUtilisateur->Note }}</td>
											<td>{{ $avisUtilisateur->Commentaire }}</td>
											<td>{{ $avisUtilisateur->isRead }}</td>

                                            <td>
                                                <div class="dropdown">
                                                    <button class="btn btn-primary dropdown-toggle btn-sm" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        Actions
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                        <a class="dropdown-item" href="{{ route('avis-utilisateurs.show',$avisUtilisateur->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Voir') }}</a>
                                                        <a class="dropdown-item" href="{{ route('avis-utilisateurs.edit',$avisUtilisateur->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Modifier') }}</a>
                                                        <div class="dropdown-divider"></div>
                                                        <form action="{{ route('avis-utilisateurs.destroy',$avisUtilisateur->id) }}" method="POST">
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
                {!! $avisUtilisateurs->links() !!}
            </div>
        </div>
    </div>
@endsection
