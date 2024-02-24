<div class="">
    <div class="row">

        <div class="form-group col-md-8 col-12 my-2">
            <strong class="mb-2 text-dark"> {{ Form::label('Catégorie') }} <span class="text-danger">*</span> </strong>
            {{ Form::select('categorie_id', $categories, $cour->categorie_id, ['class' => 'form-control form-select select2' . ($errors->has('categorie_id') ? ' is-invalid' : ''), 'required' => 'required', 'placeholder' => '-- Sélectionner --']) }}
            {!! $errors->first('categorie_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group col-md-4 col-12 my-2">

            <strong class="mb-2 text-dark"> {{ Form::label('Titre') }} <span class="text-danger">*</span> </strong>
            {{ Form::text('Titre', $cour->Titre, ['maxlength' => '255', 'class' => 'form-control' . ($errors->has('Titre') ? ' is-invalid' : ''), 'required' => 'required']) }}
            {!! $errors->first('Titre', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group col-md-12 col-12 my-2">
            <strong class="mb-2 text-dark"> {{ Form::label('Description') }} <span class="text-danger">*</span> </strong>
            {{ Form::text('Description', $cour->Description, ['maxlength' => '255', 'class' => 'form-control' . ($errors->has('Description') ? ' is-invalid' : ''), 'required' => 'required']) }}
            {!! $errors->first('Description', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group col-md-12 col-12 my-2">

            <strong class="mb-2 text-dark"> {{ Form::label('Image de Couverture') }} <span
                    class="text-danger">{{ $cour->imageExists() ? '' : '*' }} </span>
                @if ($cour->imageExists())
                    <div class="py-2">
                        <img src="{{ asset($cour->Image) }}" class="img-thumbnail" alt="Image"
                            style="max-height: 200px;">
                    </div>
                @endif
            </strong>
            {{ Form::file('Image', ['accept' => 'image/*', 'class' => 'form-control' . ($errors->has('Image') ? ' is-invalid' : ''), $cour->imageExists() ? '' : 'required' => 'required']) }}
            {!! $errors->first('Image', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group col-md-12 col-12 my-2">
            <strong class="mb-2 text-dark"> {{ Form::label('Contenu') }} <span class="text-danger">*</span> </strong>
            {{ Form::textArea('Contenu', $cour->Contenu, ['class' => 'form-control editor' . ($errors->has('Contenu') ? ' is-invalid' : ''), 'required' => 'required']) }}
            {!! $errors->first('Contenu', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        {{-- <div class="form-group col-md-4 col-12 my-2 ">
            <strong class="mb-2 text-dark"> {{ Form::label('Professeur_id') }} <span class="text-danger">*</span>
            </strong>
            {{ Form::text('Professeur_id', $cour->Professeur_id, ['class' => 'form-control' . ($errors->has('Professeur_id') ? ' is-invalid' : ''), 'required' => 'required']) }}
            {!! $errors->first('Professeur_id', '<div class="invalid-feedback">:message</div>') !!}
        </div> --}}

    </div>
    <div class="box-footer mt-3">
        <button type="submit" class="btn btn-success">Enregistrer</button>
    </div>
</div>
