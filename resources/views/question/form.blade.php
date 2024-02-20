<div class="">
    <div class="row">
        
        <div class="form-group col-md-4 col-12 my-2">
            <strong class="mb-2 text-dark"> {{ Form::label('cours_id') }} <span class="text-danger">*</span> </strong>
            {{ Form::text('cours_id', $question->cours_id, ['class' => 'form-control' . ($errors->has('cours_id') ? ' is-invalid' : ''), 'required' => 'required']) }}
            {!! $errors->first('cours_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group col-md-4 col-12 my-2">
            <strong class="mb-2 text-dark"> {{ Form::label('Libelle') }} <span class="text-danger">*</span> </strong>
            {{ Form::text('Libelle', $question->Libelle, ['class' => 'form-control' . ($errors->has('Libelle') ? ' is-invalid' : ''), 'required' => 'required']) }}
            {!! $errors->first('Libelle', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group col-md-4 col-12 my-2">
            <strong class="mb-2 text-dark"> {{ Form::label('Point') }} <span class="text-danger">*</span> </strong>
            {{ Form::text('Point', $question->Point, ['class' => 'form-control' . ($errors->has('Point') ? ' is-invalid' : ''), 'required' => 'required']) }}
            {!! $errors->first('Point', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt-3">
        <button type="submit" class="btn btn-success">Enregistrer</button>
    </div>
</div>
