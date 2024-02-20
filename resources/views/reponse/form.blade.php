<div class="">
    <div class="row">
        
        <div class="form-group col-md-4 col-12 my-2">
            <strong class="mb-2 text-dark"> {{ Form::label('question_id') }} <span class="text-danger">*</span> </strong>
            {{ Form::text('question_id', $reponse->question_id, ['class' => 'form-control' . ($errors->has('question_id') ? ' is-invalid' : ''), 'required' => 'required']) }}
            {!! $errors->first('question_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group col-md-4 col-12 my-2">
            <strong class="mb-2 text-dark"> {{ Form::label('Libelle') }} <span class="text-danger">*</span> </strong>
            {{ Form::text('Libelle', $reponse->Libelle, ['class' => 'form-control' . ($errors->has('Libelle') ? ' is-invalid' : ''), 'required' => 'required']) }}
            {!! $errors->first('Libelle', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group col-md-4 col-12 my-2">
            <strong class="mb-2 text-dark"> {{ Form::label('isCorrect') }} <span class="text-danger">*</span> </strong>
            {{ Form::text('isCorrect', $reponse->isCorrect, ['class' => 'form-control' . ($errors->has('isCorrect') ? ' is-invalid' : ''), 'required' => 'required']) }}
            {!! $errors->first('isCorrect', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt-3">
        <button type="submit" class="btn btn-success">Enregistrer</button>
    </div>
</div>
