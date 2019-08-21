@extends('layouts.app')

@section('title','Inventory - Inventory Management')

@section('breadcrumb','Management')

@section('breadcrumb-active','Inventory')

@section('content')
<!-- Form Add New Inventory -->


<!-- DataTables Example -->
<div class="card mb-3">
    <div class="card-header"><i class="fas fa-table"></i>User List</div>
    <div class="card-body">
        <p class="error text-center alert alert-danger hidden"></p>
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
                        <th><button type="button" class="btn btn-warning" data-toggle="modal" data-target="#addModal">
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

@section('custom-script')
<script>
//add new user
$("#add").click(function() {

    var conditions = {
        'good': $('input[name=good]').val(),
        'poor': $('input[name=poor]').val(),
        'critical': $('input[name=critical]').val()
    }

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
 
 $.ajax({
     type: 'POST',
     url: '/inventories',
     data: {
         '_token': $('input[name=_token]').val(),
         'name': $('input[name=name]').val(),
         'type_id': $('input[name=type]').val(),
         'room_id': $('input[name=room]').val(),
         'condition': conditions,
         'description': $('#InputDescription').val(),
         
     },

    success: function(data) {
        if ((data.errors)) {
             $('.error').removeClass('hidden');
             $('.error').text(data.errors.name);
        } else {
             $('.error').remove();
             $('tbody').append("<tr class='item" + data.id + "'><td>" + data.name + "</td><td>" + data.type_id + "</td><td>" + data.room_id + "</td><td>" + data.condition + "</td><td>" + data.description + "</td><td><button class='edit-modal btn btn-info' data-id='" + data.id + "' data-name='" + data.name + "'data-type='" + data.type + "'data-id='" + data.room + "'data-id='" + data.condition + "'data-id='" + data.description + "'><i class='fas fa-edit'></i></button><button class='delete-modal btn btn-danger' data-id='" + data.id + "' data-name='" + data.name + "'data-type='" + data.type + "'data-id='" + data.room + "'data-id='" + data.condition + "'data-id='" + data.description + "'><i class='fas fa-trash'></i></button></td></tr>");
        }
     },
     
    });
        
});

</script>
@endsection