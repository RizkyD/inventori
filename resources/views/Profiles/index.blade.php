@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between">
        <h5 class="align-middle">Profile</h5>
        <div class="btn btn-success float-right">{{Str::title($user->role)}}</div>
    </div>
    <div class="card-body">
    {!! Form::open(['url' => route('ProfileController.update'), 'method' => 'put', 'files' => 'true', 'class' => 'form-horizontal']) !!}
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputUsername">Username</label>
                    {!! Form::text('username', isset($user->username) ? $user->username : '', ['class' => 'form-control']) !!}
                </div>
                <div class="form-group col-md-6">
                    <label for="inputName">Name</label>
                    {!! Form::text('name', isset($user->name) ? $user->name : '', ['class' => 'form-control']) !!}
                </div>
            </div>
                <div class="form-group">
                    <label for="inputAddress">Address</label>
                    {!! Form::text('address', isset($user->address) ? $user->address : '', ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    <label for="inputRegNumber">Registration Number</label>
                    {!! Form::text('reg_number', isset($user->reg_number) ? $user->reg_number : '', ['class' => 'form-control']) !!}
                </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        {!! Form::close() !!}
  </div>
</div>
@endsection