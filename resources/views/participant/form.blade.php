<div class="">
    <div class="row">
        
        <div class="form-group col-md-4 col-12 my-2">
            <strong class="mb-2 text-dark"> {{ Form::label('user_id') }} <span class="text-danger">*</span> </strong>
            {{ Form::text('user_id', $participant->user_id, ['class' => 'form-control' . ($errors->has('user_id') ? ' is-invalid' : ''), 'required' => 'required']) }}
            {!! $errors->first('user_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group col-md-4 col-12 my-2">
            <strong class="mb-2 text-dark"> {{ Form::label('session_meet_id') }} <span class="text-danger">*</span> </strong>
            {{ Form::text('session_meet_id', $participant->session_meet_id, ['class' => 'form-control' . ($errors->has('session_meet_id') ? ' is-invalid' : ''), 'required' => 'required']) }}
            {!! $errors->first('session_meet_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group col-md-4 col-12 my-2">
            <strong class="mb-2 text-dark"> {{ Form::label('isProfessor') }} <span class="text-danger">*</span> </strong>
            {{ Form::text('isProfessor', $participant->isProfessor, ['class' => 'form-control' . ($errors->has('isProfessor') ? ' is-invalid' : ''), 'required' => 'required']) }}
            {!! $errors->first('isProfessor', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group col-md-4 col-12 my-2">
            <strong class="mb-2 text-dark"> {{ Form::label('isPresent') }} <span class="text-danger">*</span> </strong>
            {{ Form::text('isPresent', $participant->isPresent, ['class' => 'form-control' . ($errors->has('isPresent') ? ' is-invalid' : ''), 'required' => 'required']) }}
            {!! $errors->first('isPresent', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt-3">
        <button type="submit" class="btn btn-success">Enregistrer</button>
    </div>
</div>
