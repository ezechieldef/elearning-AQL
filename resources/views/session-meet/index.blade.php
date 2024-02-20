@extends('layouts.app')

@section('template_title')
    Liste Session Meet
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
                            <a href="{{ route('session-meets.create') }}" class="btn btn-sm btn-primary"> Nouveau</a>
                        </div>
                        <div class="col mb-2">
                            <h5 class="card-title text-dark fw-bolder mb-0">Session Meet(s)</h5>
                            <span>Liste des  Session Meet</span>
                            <hr>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped table-hover datatable">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th>Etudiant Id</th>
										<th>Datedebut</th>
										<th>Lien</th>
										<th>Isapproved</th>
										<th>Iscompleted</th>
										<th>Isrejected</th>
										<th>Motifrejet</th>
										<th>Status</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($sessionMeets as $sessionMeet)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $sessionMeet->etudiant_id }}</td>
											<td>{{ $sessionMeet->DateDebut }}</td>
											<td>{{ $sessionMeet->Lien }}</td>
											<td>{{ $sessionMeet->isApproved }}</td>
											<td>{{ $sessionMeet->isCompleted }}</td>
											<td>{{ $sessionMeet->isRejected }}</td>
											<td>{{ $sessionMeet->MotifRejet }}</td>
											<td>{{ $sessionMeet->status }}</td>

                                            <td>
                                                <div class="dropdown">
                                                    <button class="btn btn-primary dropdown-toggle btn-sm" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        Actions
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                        <a class="dropdown-item" href="{{ route('session-meets.show',$sessionMeet->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Voir') }}</a>
                                                        <a class="dropdown-item" href="{{ route('session-meets.edit',$sessionMeet->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Modifier') }}</a>
                                                        <div class="dropdown-divider"></div>
                                                        <form action="{{ route('session-meets.destroy',$sessionMeet->id) }}" method="POST">
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
                {!! $sessionMeets->links() !!}
            </div>
        </div>
    </div>
@endsection
