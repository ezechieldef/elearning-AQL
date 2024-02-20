<div class="">
    <div class="row">
        
        <div class="form-group col-md-4 col-12 my-2">
            <strong class="mb-2 text-dark"> {{ Form::label('categorie_id') }} <span class="text-danger">*</span> </strong>
            {{ Form::text('categorie_id', $cour->categorie_id, ['class' => 'form-control' . ($errors->has('categorie_id') ? ' is-invalid' : ''), 'required' => 'required']) }}
            {!! $errors->first('categorie_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group col-md-4 col-12 my-2">
            <strong class="mb-2 text-dark"> {{ Form::label('Titre') }} <span class="text-danger">*</span> </strong>
            {{ Form::text('Titre', $cour->Titre, ['class' => 'form-control' . ($errors->has('Titre') ? ' is-invalid' : ''), 'required' => 'required']) }}
            {!! $errors->first('Titre', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group col-md-4 col-12 my-2">
            <strong class="mb-2 text-dark"> {{ Form::label('Description') }} <span class="text-danger">*</span> </strong>
            {{ Form::text('Description', $cour->Description, ['class' => 'form-control' . ($errors->has('Description') ? ' is-invalid' : ''), 'required' => 'required']) }}
            {!! $errors->first('Description', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group col-md-4 col-12 my-2">
            <strong class="mb-2 text-dark"> {{ Form::label('Image') }} <span class="text-danger">*</span> </strong>
            {{ Form::text('Image', $cour->Image, ['class' => 'form-control' . ($errors->has('Image') ? ' is-invalid' : ''), 'required' => 'required']) }}
            {!! $errors->first('Image', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group col-md-4 col-12 my-2">
            <strong class="mb-2 text-dark"> {{ Form::label('Contenu') }} <span class="text-danger">*</span> </strong>
            {{ Form::text('Contenu', $cour->Contenu, ['class' => 'form-control' . ($errors->has('Contenu') ? ' is-invalid' : ''), 'required' => 'required']) }}
            {!! $errors->first('Contenu', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group col-md-4 col-12 my-2">
            <strong class="mb-2 text-dark"> {{ Form::label('Professeur_id') }} <span class="text-danger">*</span> </strong>
            {{ Form::text('Professeur_id', $cour->Professeur_id, ['class' => 'form-control' . ($errors->has('Professeur_id') ? ' is-invalid' : ''), 'required' => 'required']) }}
            {!! $errors->first('Professeur_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt-3">
        <button type="submit" class="btn btn-success">Enregistrer</button>
    </div>
</div>
