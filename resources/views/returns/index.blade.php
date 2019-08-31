@extends('layouts.app')

@section('title','Inventory - Returning')

@section('breadcrumb','Returning Items')

@section('breadcrumb-active','Returning')

@section('content')
<!-- Form Add New Inventory -->


<!-- DataTables Example -->
<div class="card mb-3">
    <div class="card-header"><i class="fas fa-table"></i>Borrow List</div>
    <div class="card-body">
        <p class="error text-center alert alert-danger" style="display:none"></p>
        <div class="table-responsive">
            <table id="example" class="table table-striped table-bordered nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th>Name Item</th>
                        <th>Borrower</th>
                        <th>Quantity</th>
                        <th>Jadwal Kembali</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($data as $d)
                    <tr>
                        <th>{{$d->inventory['name']}}</th>
                        <th>{{$d->user['name']}}</th>
                        <th>{{$d->qty}}</th>
                        <th>{{$d->return_schedule}}</th>
                        <th>{{$d->status}}</th>
                        <th>
                        {!! Form::open(['url' => route('return', $d->id), 'method' => 'post', 'files' => 'true', 'class' => 'form-horizontal']) !!}
                        {!! Form::submit('Kembalikan', ['class' => 'btn btn-primary']) !!}
                        {!! Form::close() !!}
                        </th>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
</div>
@endsection