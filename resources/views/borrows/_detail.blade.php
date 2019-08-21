<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    <div class="modal-header">
    Reimbursement
    </div>
      <div class="modal-body">
      {!! Form::open(['url' => route('borrow', $d->id), 'method' => 'post', 'files' => 'true', 'class' => 'form-horizontal']) !!}

      <div class="form-group{{ $errors->has('qty') ? ' has-error': '' }}">
    {!! Form::label('qty', 'qty', ['class' => 'col-md-2 control-label']) !!}

    <div class="col-md-4">
        {!! Form::text('qty', null, ['class' => 'form-control']) !!}
        {!! $errors->first('qty', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group{{ $errors->has('desc') ? ' has-error': '' }}">
    {!! Form::label('desc', 'desc', ['class' => 'col-md-2 control-label']) !!}

    <div class="col-md-4">
        {!! Form::text('desc', null, ['class' => 'form-control']) !!}
        {!! $errors->first('desc', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-4 col-md-offset-2">
        {!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}
    </div>
</div>

{!! Form::close() !!}
    </div>
  </div>
</div>