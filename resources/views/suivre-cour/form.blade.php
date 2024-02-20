<div class="">
    <div class="row">
        
        <div class="form-group col-md-4 col-12 my-2">
            <strong class="mb-2 text-dark"> {{ Form::label('cours_id') }} <span class="text-danger">*</span> </strong>
            {{ Form::text('cours_id', $suivreCour->cours_id, ['class' => 'form-control' . ($errors->has('cours_id') ? ' is-invalid' : ''), 'required' => 'required']) }}
            {!! $errors->first('cours_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group col-md-4 col-12 my-2">
            <strong class="mb-2 text-dark"> {{ Form::label('etudiant_id') }} <span class="text-danger">*</span> </strong>
            {{ Form::text('etudiant_id', $suivreCour->etudiant_id, ['class' => 'form-control' . ($errors->has('etudiant_id') ? ' is-invalid' : ''), 'required' => 'required']) }}
            {!! $errors->first('etudiant_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group col-md-4 col-12 my-2">
            <strong class="mb-2 text-dark"> {{ Form::label('isCompleted') }} <span class="text-danger">*</span> </strong>
            {{ Form::text('isCompleted', $suivreCour->isCompleted, ['class' => 'form-control' . ($errors->has('isCompleted') ? ' is-invalid' : ''), 'required' => 'required']) }}
            {!! $errors->first('isCompleted', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group col-md-4 col-12 my-2">
            <strong class="mb-2 text-dark"> {{ Form::label('Note') }} <span class="text-danger">*</span> </strong>
            {{ Form::text('Note', $suivreCour->Note, ['class' => 'form-control' . ($errors->has('Note') ? ' is-invalid' : ''), 'required' => 'required']) }}
            {!! $errors->first('Note', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group col-md-4 col-12 my-2">
            <strong class="mb-2 text-dark"> {{ Form::label('DateInscription') }} <span class="text-danger">*</span> </strong>
            {{ Form::text('DateInscription', $suivreCour->DateInscription, ['class' => 'form-control' . ($errors->has('DateInscription') ? ' is-invalid' : ''), 'required' => 'required']) }}
            {!! $errors->first('DateInscription', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group col-md-4 col-12 my-2">
            <strong class="mb-2 text-dark"> {{ Form::label('DateDebutComposition') }} <span class="text-danger">*</span> </strong>
            {{ Form::text('DateDebutComposition', $suivreCour->DateDebutComposition, ['class' => 'form-control' . ($errors->has('DateDebutComposition') ? ' is-invalid' : ''), 'required' => 'required']) }}
            {!! $errors->first('DateDebutComposition', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group col-md-4 col-12 my-2">
            <strong class="mb-2 text-dark"> {{ Form::label('DateCompletion') }} <span class="text-danger">*</span> </strong>
            {{ Form::text('DateCompletion', $suivreCour->DateCompletion, ['class' => 'form-control' . ($errors->has('DateCompletion') ? ' is-invalid' : ''), 'required' => 'required']) }}
            {!! $errors->first('DateCompletion', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt-3">
        <button type="submit" class="btn btn-success">Enregistrer</button>
    </div>
</div>
