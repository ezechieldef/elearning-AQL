@php
    $breadcrumbs = [
        'Cours' => '/cours-public',
        $cour->Titre => '',
    ];
    $pageTitle = $cour->Titre;
@endphp
@extends('layouts.app')



@section('content')
    <div class="container">
        <div class="">

            <div class="card rounded-2 overflow-hidden">
                <div class="position-relative">
                    <a href="javascript:void(0)"><img src="{{ asset($cour->Image) }}" alt="..."
                            class="card-img-top rounded-0 object-fit-cover" alt="..."></a>

                </div>
                <div class="card-body p-4">
                    <span class="badge text-bg-light fs-2 rounded-4 py-1 px-2 lh-sm  mt-3">
                        {{ $cour->category()->first()->Libelle }}</span>
                    </span>
                    <h2 class="fs-9 fw-semibold my-4">
                        {{ $cour->Titre }}
                    </h2>
                    <div class="d-flex align-items-center gap-4">
                        {{-- <div class="d-flex align-items-center gap-2"><i class="ti ti-eye text-dark fs-5"></i>
                            {{ $enseignement->getViewsCount() }}
                        </div>
                        <div class="d-flex align-items-center gap-2"><i class="ti ti-message-2 text-dark fs-5"></i>
                            {{ $enseignement->getCommentaires()->count() }}
                        </div> --}}
                        <div class="d-flex align-items-center fs-2 ms-auto"><i class="ti ti-point text-dark"></i>
                            {{ $cour->created_at->format('D, M d') }}

                        </div>
                    </div>
                </div>
                <div class="card-body border-top p-4">
                    {!! $cour->Contenu !!}
                </div>
                @role('ETUDIANT')
                    <div class="text-end">
                        <a href="404" class="btn btn-success px-3">J'ai fini ce cours</a>
                    </div>
                @endrole
            </div>

        </div>
    </div>
@endsection
