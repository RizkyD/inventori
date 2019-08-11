@extends('layouts.app')

@section('title','Inventory - Inventory Management')

@section('breadcrumb','Management')

@section('breadcrumb-active','Inventory')

@section('content')
<!-- Form Add New Inventory -->
<div class="card mb-3">
    <div class="card-header">
    <i class="fas fa-table"></i>
    Add New Inventory
    </div>
    <div class="card-body">
        <div class="form-group">
            <label for="InputName">Name</label>
            <input type="text" class="form-control" id="InputName" name="name" placeholder="Enter Name">
        </div>
        <div class="form-group">
            <label for="InputType">Type</label>
            <input type="text" class="form-control" id="InputType" name="type" placeholder="Enter Type">
        </div>
        <div class="form-group">
            <label for="InputRoom">Room</label>
            <input type="text" class="form-control" id="InputRoom" name="room" placeholder="Enter Room">
        </div>
        <div class="form-inline" id="condition">
            <div class="form-group col-md-4">
                <label for="InputGoodCondition">Good Condition</label>
                <input type="text" class="form-control" id="InputGoodCondition" name="good" placeholder="Enter Qty">
            </div>
            <div class="form-group col-md-4">
                <label for="InputPoorCondition">Poor Condition</label>
                <input type="text" class="form-control" id="InputPoorCondition" name="poor" placeholder="Enter Qty">
            </div>
            <div class="form-group col-md-4">
                <label for="InputCriticalCondition">Critical Condition</label>
                <input type="text" class="form-control" id="InputCriticalCondition" name="critical" placeholder="Enter Qty">
            </div>
        </div>
        <div class="form-group">
            <label for="InputDescription">Description</label>
            <textarea class="form-control" id="InputDescription" rows="4" name="description" placeholder="Enter Description"></textarea>
        </div>
        @csrf
        <button type="submit" class="btn btn-primary mb-3"  id="add" >Submit</button>
    </div>
</div>

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
                        <th>Type</th>
                        <th>Room</th>
                        <th>Condition</th>
                        <th>Description</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

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
         'id_type': $('input[name=type]').val(),
         'id_room': $('input[name=room]').val(),
         'condition': conditions,
         'description': $('#InputDescription').val(),
         
     },

    success: function(data) {
        if ((data.errors)) {
             $('.error').removeClass('hidden');
             $('.error').text(data.errors.name);
        } else {
             $('.error').remove();
             $('tbody').append("<tr class='item" + data.id + "'><td>" + data.name + "</td><td>" + data.id_type + "</td><td>" + data.id_room + "</td><td>" + data.condition + "</td><td>" + data.description + "</td><td><button class='edit-modal btn btn-info' data-id='" + data.id + "' data-name='" + data.name + "'data-type='" + data.type + "'data-id='" + data.room + "'data-id='" + data.condition + "'data-id='" + data.description + "'><i class='fas fa-edit'></i></button><button class='delete-modal btn btn-danger' data-id='" + data.id + "' data-name='" + data.name + "'data-type='" + data.type + "'data-id='" + data.room + "'data-id='" + data.condition + "'data-id='" + data.description + "'><i class='fas fa-trash'></i></button></td></tr>");
        }
     },
     
    });
        
});

</script>
@endsection