<div class="">
    <div class="row">

        {{-- <div class="form-group col-md-4 col-12 my-2">
            <strong class="mb-2 text-dark"> {{ Form::label('professeur_id') }} <span class="text-danger">*</span> </strong>
            {{ Form::text('professeur_id', $liveDisponible->professeur_id, ['class' => 'form-control' . ($errors->has('professeur_id') ? ' is-invalid' : ''), 'required' => 'required']) }}
            {!! $errors->first('professeur_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group col-md-4 col-12 my-2">
            <strong class="mb-2 text-dark"> {{ Form::label('isPublished') }} <span class="text-danger">*</span> </strong>
            {{ Form::text('isPublished', $liveDisponible->isPublished, ['class' => 'form-control' . ($errors->has('isPublished') ? ' is-invalid' : ''), 'required' => 'required']) }}
            {!! $errors->first('isPublished', '<div class="invalid-feedback">:message</div>') !!}
        </div> --}}
        <div class="form-group col-md-12 col-12 my-2">
            <strong class="mb-2 text-dark"> {{ Form::label('Catégorie') }} <span class="text-danger">*</span> </strong>
            {{ Form::select('categorie_id', $categories, $liveDisponible->categorie_id, ['class' => 'form-control form-select select2' . ($errors->has('categorie_id') ? ' is-invalid' : ''), 'required' => 'required', 'placeholder' => '-- Sélectionner --']) }}
            {!! $errors->first('categorie_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group col-md-12 col-12 my-2">
            <strong class="mb-2 text-dark"> {{ Form::label('Titre') }} <span class="text-danger">*</span> </strong>
            {{ Form::text('Titre', $liveDisponible->Titre, ['maxlength' => '255', 'class' => 'form-control' . ($errors->has('Titre') ? ' is-invalid' : ''), 'required' => 'required']) }}
            {!! $errors->first('Titre', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group col-md-12 col-12 my-2">
            <strong class="mb-2 text-dark"> {{ Form::label('Description') }} <span class="text-danger">*</span> </strong>
            {{ Form::textArea('Description', $liveDisponible->Description, ['class' => 'form-control editor ' . ($errors->has('Description') ? ' is-invalid' : ''), 'required' => 'required']) }}
            {!! $errors->first('Description', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt-3">
        <button type="submit" class="btn btn-success">Enregistrer</button>
    </div>
</div>
