<div class="">
    <div class="row">
        
        <div class="form-group col-md-4 col-12 my-2">
            <strong class="mb-2 text-dark"> {{ Form::label('user_id') }} <span class="text-danger">*</span> </strong>
            {{ Form::text('user_id', $avisUtilisateur->user_id, ['class' => 'form-control' . ($errors->has('user_id') ? ' is-invalid' : ''), 'required' => 'required']) }}
            {!! $errors->first('user_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group col-md-4 col-12 my-2">
            <strong class="mb-2 text-dark"> {{ Form::label('cours_id') }} <span class="text-danger">*</span> </strong>
            {{ Form::text('cours_id', $avisUtilisateur->cours_id, ['class' => 'form-control' . ($errors->has('cours_id') ? ' is-invalid' : ''), 'required' => 'required']) }}
            {!! $errors->first('cours_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group col-md-4 col-12 my-2">
            <strong class="mb-2 text-dark"> {{ Form::label('session_meet_id') }} <span class="text-danger">*</span> </strong>
            {{ Form::text('session_meet_id', $avisUtilisateur->session_meet_id, ['class' => 'form-control' . ($errors->has('session_meet_id') ? ' is-invalid' : ''), 'required' => 'required']) }}
            {!! $errors->first('session_meet_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group col-md-4 col-12 my-2">
            <strong class="mb-2 text-dark"> {{ Form::label('Note') }} <span class="text-danger">*</span> </strong>
            {{ Form::text('Note', $avisUtilisateur->Note, ['class' => 'form-control' . ($errors->has('Note') ? ' is-invalid' : ''), 'required' => 'required']) }}
            {!! $errors->first('Note', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group col-md-4 col-12 my-2">
            <strong class="mb-2 text-dark"> {{ Form::label('Commentaire') }} <span class="text-danger">*</span> </strong>
            {{ Form::text('Commentaire', $avisUtilisateur->Commentaire, ['class' => 'form-control' . ($errors->has('Commentaire') ? ' is-invalid' : ''), 'required' => 'required']) }}
            {!! $errors->first('Commentaire', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group col-md-4 col-12 my-2">
            <strong class="mb-2 text-dark"> {{ Form::label('isRead') }} <span class="text-danger">*</span> </strong>
            {{ Form::text('isRead', $avisUtilisateur->isRead, ['class' => 'form-control' . ($errors->has('isRead') ? ' is-invalid' : ''), 'required' => 'required']) }}
            {!! $errors->first('isRead', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt-3">
        <button type="submit" class="btn btn-success">Enregistrer</button>
    </div>
</div>
