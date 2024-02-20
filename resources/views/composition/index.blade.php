@extends('layouts.app')

@section('template_title')
    Liste Composition
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
                            <a href="{{ route('compositions.create') }}" class="btn btn-sm btn-primary"> Nouveau</a>
                        </div>
                        <div class="col mb-2">
                            <h5 class="card-title text-dark fw-bolder mb-0">Composition(s)</h5>
                            <span>Liste des  Composition</span>
                            <hr>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped table-hover datatable">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th>Suivre Cours Id</th>
										<th>Question Id</th>
										<th>Reponse Id</th>
										<th>Points</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($compositions as $composition)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $composition->suivre_cours_id }}</td>
											<td>{{ $composition->question_id }}</td>
											<td>{{ $composition->reponse_id }}</td>
											<td>{{ $composition->Points }}</td>

                                            <td>
                                                <div class="dropdown">
                                                    <button class="btn btn-primary dropdown-toggle btn-sm" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        Actions
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                        <a class="dropdown-item" href="{{ route('compositions.show',$composition->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Voir') }}</a>
                                                        <a class="dropdown-item" href="{{ route('compositions.edit',$composition->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Modifier') }}</a>
                                                        <div class="dropdown-divider"></div>
                                                        <form action="{{ route('compositions.destroy',$composition->id) }}" method="POST">
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
                {!! $compositions->links() !!}
            </div>
        </div>
    </div>
@endsection
