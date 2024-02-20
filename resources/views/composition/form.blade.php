<div class="">
    <div class="row">
        
        <div class="form-group col-md-4 col-12 my-2">
            <strong class="mb-2 text-dark"> {{ Form::label('suivre_cours_id') }} <span class="text-danger">*</span> </strong>
            {{ Form::text('suivre_cours_id', $composition->suivre_cours_id, ['class' => 'form-control' . ($errors->has('suivre_cours_id') ? ' is-invalid' : ''), 'required' => 'required']) }}
            {!! $errors->first('suivre_cours_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group col-md-4 col-12 my-2">
            <strong class="mb-2 text-dark"> {{ Form::label('question_id') }} <span class="text-danger">*</span> </strong>
            {{ Form::text('question_id', $composition->question_id, ['class' => 'form-control' . ($errors->has('question_id') ? ' is-invalid' : ''), 'required' => 'required']) }}
            {!! $errors->first('question_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group col-md-4 col-12 my-2">
            <strong class="mb-2 text-dark"> {{ Form::label('reponse_id') }} <span class="text-danger">*</span> </strong>
            {{ Form::text('reponse_id', $composition->reponse_id, ['class' => 'form-control' . ($errors->has('reponse_id') ? ' is-invalid' : ''), 'required' => 'required']) }}
            {!! $errors->first('reponse_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group col-md-4 col-12 my-2">
            <strong class="mb-2 text-dark"> {{ Form::label('Points') }} <span class="text-danger">*</span> </strong>
            {{ Form::text('Points', $composition->Points, ['class' => 'form-control' . ($errors->has('Points') ? ' is-invalid' : ''), 'required' => 'required']) }}
            {!! $errors->first('Points', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt-3">
        <button type="submit" class="btn btn-success">Enregistrer</button>
    </div>
</div>
