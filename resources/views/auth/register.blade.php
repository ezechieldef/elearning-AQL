@extends('auth.template')

@section('content')
    <form method="POST" action="{{ route('register') }}" role="form" class="text-start">
        @csrf

        <div class="bg-success text-white text-center text-bold p-3 mb-4" style="margin-top: -60px; border-radius:10px;">
            <h3 class="text-white">Inscription</h3>

        </div>
        <div class="row">

            <div class="col-12 text-start my-2">

                <div class="col-12 text-start my-2">
                    <label for="name" class="text-dark text-bold">Vous êtes un : </label>


                    <div class="form-group">
                        <div class="btn-group btn-group-toggle d-flex" data-toggle="buttons">
                            <label class="btn btn-light border flex-fill">
                                <input type="radio" name="role" id="etudiant" value="ETUDIANT" required> Etudiant
                            </label>
                            <label class="btn btn-light border flex-fill">
                                <input type="radio" name="role" id="professeur" value="PROFESSEUR" required> Professeur
                            </label>
                        </div>
                    </div>
                    @error('role')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                </div>

            </div>

            <div class="col-12 text-start my-2">
                <label for="name" class="text-dark text-bold">Nom & Prénoms</label>
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                    value="{{ old('name') }}" required autocomplete="name" autofocus>

                <small id="email" class="text-muted ">
                    <i class="fa-solid fa-circle-info text-italic me-1 "></i>
                    Pour vous identifer facilement sur cette plateforme
                </small>
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="col-12 text-start my-2">
                <label for="" class="text-dark text-bold">Email</label>
                <input id="email" type="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"
                    class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"
                    required autocomplete="email">

                <small id="email" class="text-muted ">
                    <i class="fa-solid fa-circle-info text-italic me-1 "></i>
                    Votre adresse email valide
                </small>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="col-12 text-start my-2">
                <label for="" class="text-dark text-bold">
                    Mot De Passe</label>


                <div class="pass_show_hide">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                        name="password" required autocomplete="new-password" minlength="8">


                </div>




                <small id="password" class="text-muted">
                    <i class="fa-solid fa-circle-info text-italic me-1"></i>
                    Définir un nouveau mot de passe spécifique à cette plateforme
                </small>
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="col-12 text-start my-2">
                <label for="" class="text-dark text-bold">Confirmer Mot De Passe</label>

                <div class="pass_show_hide">

                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required
                        autocomplete="new-password" minlength="8">


                </div>


                <small id="password" class="text-muted">
                    <i class="fa-solid fa-circle-info text-italic me-1"></i>
                    Confirmer le mot de passe précédemment saisi
                </small>

            </div>

            <div class="col-12 text-start my-2">

                <button type="submit" class="btn btn-success w-100  mb-2 text-white text-bold ">S'inscrire</button>
            </div>
            <div class="d-flex justify-content-around align-items-center w-100">

                <div><a href="/login" class="mt-4 text-sm text-center text-bold">Avez vous déjà un compte
                        ?</a></div>
            </div>

        </div>



    </form>
@endsection
