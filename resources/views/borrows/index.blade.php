@extends('layouts.app')

@section('title','Inventory - Borrowing')

@section('breadcrumb','Borrowing Items')

@section('breadcrumb-active','Borrowing')

@section('content')
<!-- Form Add New Inventory -->


<!-- DataTables Example -->
<div class="card mb-3">
    <div class="card-header"><i class="fas fa-table"></i>Inventory List</div>
    <div class="card-body">
    @if (auth::user()->role == 'administrator')
<a href="/borrow/export_excel" class="btn btn-success md-3" target="_blank">EXPORT EXCEL</a>
@endif
        <p class="error text-center alert alert-danger" style="display:none"></p>
        <div class="table-responsive">
            <table id="example" class="table table-striped table-bordered nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Quantity</th>
                        <th>Condition</th>
                        <th>Description</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($data as $d)
                    <tr>
                        <th>{{$d->name}}</th>
                        <th>{{$d->desc}}</th>
                        <th>{{$d->qty}}</th>
                        <th>-</th>
                        <th>-</th>
                        <th><button type="button" class="btn btn-warning" data-toggle="modal" data-target="#addModal{{$d->id}}">
                                Pinjam
                            </button>
                        </th>
                        @include('borrows._detail')  
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
</div>
@endsection