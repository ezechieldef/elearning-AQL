<div class="">
    <div class="row">
        
        <div class="form-group col-md-4 col-12 my-2">
            <strong class="mb-2 text-dark"> {{ Form::label('Nom') }} <span class="text-danger">*</span> </strong>
            {{ Form::text('Nom', $pieceJointe->Nom, ['class' => 'form-control' . ($errors->has('Nom') ? ' is-invalid' : ''), 'required' => 'required']) }}
            {!! $errors->first('Nom', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group col-md-4 col-12 my-2">
            <strong class="mb-2 text-dark"> {{ Form::label('Adresse') }} <span class="text-danger">*</span> </strong>
            {{ Form::text('Adresse', $pieceJointe->Adresse, ['class' => 'form-control' . ($errors->has('Adresse') ? ' is-invalid' : ''), 'required' => 'required']) }}
            {!! $errors->first('Adresse', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group col-md-4 col-12 my-2">
            <strong class="mb-2 text-dark"> {{ Form::label('cours_id') }} <span class="text-danger">*</span> </strong>
            {{ Form::text('cours_id', $pieceJointe->cours_id, ['class' => 'form-control' . ($errors->has('cours_id') ? ' is-invalid' : ''), 'required' => 'required']) }}
            {!! $errors->first('cours_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group col-md-4 col-12 my-2">
            <strong class="mb-2 text-dark"> {{ Form::label('Type') }} <span class="text-danger">*</span> </strong>
            {{ Form::text('Type', $pieceJointe->Type, ['class' => 'form-control' . ($errors->has('Type') ? ' is-invalid' : ''), 'required' => 'required']) }}
            {!! $errors->first('Type', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt-3">
        <button type="submit" class="btn btn-success">Enregistrer</button>
    </div>
</div>
