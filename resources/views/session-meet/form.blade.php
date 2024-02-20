<div class="">
    <div class="row">
        
        <div class="form-group col-md-4 col-12 my-2">
            <strong class="mb-2 text-dark"> {{ Form::label('etudiant_id') }} <span class="text-danger">*</span> </strong>
            {{ Form::text('etudiant_id', $sessionMeet->etudiant_id, ['class' => 'form-control' . ($errors->has('etudiant_id') ? ' is-invalid' : ''), 'required' => 'required']) }}
            {!! $errors->first('etudiant_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group col-md-4 col-12 my-2">
            <strong class="mb-2 text-dark"> {{ Form::label('DateDebut') }} <span class="text-danger">*</span> </strong>
            {{ Form::text('DateDebut', $sessionMeet->DateDebut, ['class' => 'form-control' . ($errors->has('DateDebut') ? ' is-invalid' : ''), 'required' => 'required']) }}
            {!! $errors->first('DateDebut', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group col-md-4 col-12 my-2">
            <strong class="mb-2 text-dark"> {{ Form::label('Lien') }} <span class="text-danger">*</span> </strong>
            {{ Form::text('Lien', $sessionMeet->Lien, ['class' => 'form-control' . ($errors->has('Lien') ? ' is-invalid' : ''), 'required' => 'required']) }}
            {!! $errors->first('Lien', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group col-md-4 col-12 my-2">
            <strong class="mb-2 text-dark"> {{ Form::label('isApproved') }} <span class="text-danger">*</span> </strong>
            {{ Form::text('isApproved', $sessionMeet->isApproved, ['class' => 'form-control' . ($errors->has('isApproved') ? ' is-invalid' : ''), 'required' => 'required']) }}
            {!! $errors->first('isApproved', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group col-md-4 col-12 my-2">
            <strong class="mb-2 text-dark"> {{ Form::label('isCompleted') }} <span class="text-danger">*</span> </strong>
            {{ Form::text('isCompleted', $sessionMeet->isCompleted, ['class' => 'form-control' . ($errors->has('isCompleted') ? ' is-invalid' : ''), 'required' => 'required']) }}
            {!! $errors->first('isCompleted', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group col-md-4 col-12 my-2">
            <strong class="mb-2 text-dark"> {{ Form::label('isRejected') }} <span class="text-danger">*</span> </strong>
            {{ Form::text('isRejected', $sessionMeet->isRejected, ['class' => 'form-control' . ($errors->has('isRejected') ? ' is-invalid' : ''), 'required' => 'required']) }}
            {!! $errors->first('isRejected', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group col-md-4 col-12 my-2">
            <strong class="mb-2 text-dark"> {{ Form::label('MotifRejet') }} <span class="text-danger">*</span> </strong>
            {{ Form::text('MotifRejet', $sessionMeet->MotifRejet, ['class' => 'form-control' . ($errors->has('MotifRejet') ? ' is-invalid' : ''), 'required' => 'required']) }}
            {!! $errors->first('MotifRejet', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group col-md-4 col-12 my-2">
            <strong class="mb-2 text-dark"> {{ Form::label('status') }} <span class="text-danger">*</span> </strong>
            {{ Form::text('status', $sessionMeet->status, ['class' => 'form-control' . ($errors->has('status') ? ' is-invalid' : ''), 'required' => 'required']) }}
            {!! $errors->first('status', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt-3">
        <button type="submit" class="btn btn-success">Enregistrer</button>
    </div>
</div>
