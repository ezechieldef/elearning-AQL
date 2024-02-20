<div class="">
    <div class="row">
        
        <div class="form-group col-md-4 col-12 my-2">
            <strong class="mb-2 text-dark"> {{ Form::label('Libelle') }} <span class="text-danger">*</span> </strong>
            {{ Form::text('Libelle', $category->Libelle, ['class' => 'form-control' . ($errors->has('Libelle') ? ' is-invalid' : ''), 'required' => 'required']) }}
            {!! $errors->first('Libelle', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group col-md-4 col-12 my-2">
            <strong class="mb-2 text-dark"> {{ Form::label('Description') }} <span class="text-danger">*</span> </strong>
            {{ Form::text('Description', $category->Description, ['class' => 'form-control' . ($errors->has('Description') ? ' is-invalid' : ''), 'required' => 'required']) }}
            {!! $errors->first('Description', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt-3">
        <button type="submit" class="btn btn-success">Enregistrer</button>
    </div>
</div>
