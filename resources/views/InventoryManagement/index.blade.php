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
    @csrf
        <div class="form-group">
            <label for="InputName">Name</label>
            <input type="text" class="form-control" id="InputName" name="name" placeholder="Enter Name">
        </div>
        <div class="form-row">
            <div class="form-group col-sm-6">
                <label for="InputType">Select Type:</label>
                <select class="form-control" id="InputType" name="type">
                    @foreach($types as $type)
                        <option value="{{$type->id}}">{{$type->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-sm-6">
                <label for="InputRoom">Select Room:</label>
                <select class="form-control" id="InputRoom" name="room">
                    @foreach($rooms as $room)
                        <option value="{{$room->id}}">{{$room->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
    
        <div class="form-group">
            <label for="InputQty">Qty</label>
            <input type="text" class="form-control" id="InputQty" name="qty" placeholder="Enter Qty">
        </div>
        <div class="form-group">
            <label for="InputDescription">Description</label>
            <textarea class="form-control" id="InputDescription" rows="4" name="description" placeholder="Enter Description"></textarea>
        </div>
        <button type="submit" class="btn btn-primary mb-3"  id="add" >Submit</button>
    </div>
</div>

<!-- DataTables Example -->
<div class="card mb-3">
    <div class="card-header"><i class="fas fa-table"></i>Inventory List</div>
    <div class="card-body">
        <p class="error text-center alert alert-danger hidden"></p>
        <div class="table-responsive">
            <table id="example" class="table table-striped table-bordered nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Type</th>
                        <th>Room</th>
                        <th>Qty</th>
                        <th>Description</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($dataInventories as $dataInventory)
                    <tr class="item{{$dataInventory->id}}">
                        <td>{{$dataInventory->name}}</td>
                        <td>{{$dataInventory->type->name}}</td>
                        <td>{{$dataInventory->room->name}}</td>
                        <td>{{$dataInventory->qty}}</td>
                        <td>{{$dataInventory->desc}}</td>
                        <td>
                            <button class='edit-modal btn btn-info' data-id='{{$dataInventory->id}}' data-qty='{{$dataInventory->qty}}' data-name='{{$dataInventory->name}}' data-type='{{$dataInventory->type->id}}' data-room='{{$dataInventory->room->id}}' data-description='{{$dataInventory->desc}}'><i class='fas fa-edit'></i></button>
                            <button class='delete-modal btn btn-danger' data-id='{{$dataInventory->id}}' data-name='{{$dataInventory->name}}'><i class='fas fa-trash'></i></button>
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>
    </div>
    <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
</div>

<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" role="form">
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="id">ID:</label>
                        <input type="text" class="form-control" id="id" disabled>
                    </div>
                    <div class="form-group">
                        <label for="updateName">Name</label>
                        <input type="text" class="form-control" id="updateName" placeholder="Enter Name">
                    </div>
                    <div class="form-row">
                        <div class="form-group col-sm-6">
                            <label for="updateType">Select Type:</label>
                            <select class="form-control" id="updateType">
                                @foreach($types as $type)
                                    <option value="{{$type->id}}">{{$type->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="updateRoom">Select Room:</label>
                            <select class="form-control" id="updateRoom" >
                                @foreach($rooms as $room)
                                    <option value="{{$room->id}}">{{$room->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                
                    <div class="form-group">
                        <label for="updateQty">Qty</label>
                        <input type="text" class="form-control" id="updateQty" placeholder="Enter Qty">
                    </div>
                    <div class="form-group">
                        <label for="updateDescription">Description</label>
                        <textarea class="form-control" id="updateDescription" rows="4" placeholder="Enter Description"></textarea>
                    </div>
                </form>
                <div class="deleteContent">
                    Are you Sure you want to delete <span class="dname"></span> ? <span class="hidden did"></span>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn actionBtn" data-dismiss="modal">
                        <span id="footer_action_button" class='glyphicon'> </span>
                    </button>
                    <button type="button" class="btn btn-warning" data-dismiss="modal">
                        <span class='glyphicon glyphicon-remove'></span> Close
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('custom-script')
<script>
//add new user
$("#add").click(function() {

    // var conditions = {
    //     'good': $('input[name=good]').val(),
    //     'poor': $('input[name=poor]').val(),
    //     'critical': $('input[name=critical]').val()
    // }

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
         'type_id': $('select[name=type]').val(),
         'room_id': $('select[name=room]').val(),
         'qty': $('input[name=qty]').val(),
        //  'condition': conditions,
         'desc': $('#InputDescription').val(),
         
     },

    success: function(data) {
        if ((data.errors)) {
             $('.error').removeClass('hidden');
             $('.error').text(data.errors.name);
        } else {
             $('.error').remove();
             $('tbody').prepend("<tr style='background-color:rgba(40,167,69,.5);' class='item" + data.id + "'><td>" + data.name + "</td><td>" + data.type.name + "</td><td>" + data.room.name + "</td><td>" + data.qty + "</td><td>" + data.desc + "</td><td><button class='edit-modal btn btn-info' data-id='" + data.id + "' data-name='" + data.name + "'data-type='" + data.type_id + "'data-room='" + data.room_id + "'data-qty='" + data.qty + "'data-description='" + data.desc + "'><i class='fas fa-edit'></i></button><button class='delete-modal btn btn-danger' data-id='" + data.id + "'><i class='fas fa-trash'></i></button></td></tr>");
        }
     },
     
    });
        
});

$(document).on('click', '.edit-modal', function() {
    $('#footer_action_button').text(" Update");
    $('#footer_action_button').addClass('glyphicon-check');
    $('#footer_action_button').removeClass('glyphicon-trash');
    $('.actionBtn').addClass('btn-success');
    $('.actionBtn').removeClass('btn-danger');
    $('.actionBtn').addClass('edit');
    $('.modal-title').text('Edit');
    $('.deleteContent').hide();
    $('.form-horizontal').show();
    $('#id').val($(this).data('id'));
    $('#updateName').val($(this).data('name'));
    $('#updateQty').val($(this).data('qty'));
    $('#updateDescription').val($(this).data('description'));
    $('#updateType').val($(this).data('type'));
    $('#updateRoom').val($(this).data('room'));

    $('#myModal').modal('show');
});

$('.modal-footer').on('click', '.edit', function() {
 
 $.ajax({
     type: 'put',
     url: '/inventories',
     data: {
         '_token': $('input[name=_token]').val(),
         'id':$('#id').val(),
         'name': $('#updateName').val(),
         'type_id': $('#updateType').val(),
         'room_id': $('#updateRoom').val(),
         'qty': $('#updateQty').val(),
         'desc': $('#updateDescription').val(),
     },
     success: function(data) {
         $('.item' + data.id).replaceWith("<tr style='background-color:rgba(40,167,69,.5);' class='item" + data.id + "'><td>" + data.name + "</td><td>" + data.type.name + "</td><td>" + data.room.name + "</td><td>" + data.qty + "</td><td>" + data.desc + "</td><td><button class='edit-modal btn btn-info' data-id='" + data.id + "' data-name='" + data.name + "'data-type='" + data.type_id + "'data-room='" + data.room_id + "'data-qty='" + data.qty + "'data-description='" + data.desc + "'><i class='fas fa-edit'></i></button><button class='delete-modal btn btn-danger' data-id='" + data.id + "'><i class='fas fa-trash'></i></button></td></tr>");
     }
 });
});

$(document).on('click', '.delete-modal', function() {
        $('#footer_action_button').text(" Delete");
        $('#footer_action_button').removeClass('glyphicon-check');
        $('#footer_action_button').addClass('glyphicon-trash');
        $('.actionBtn').removeClass('btn-success');
        $('.actionBtn').addClass('btn-danger');
        $('.actionBtn').addClass('delete');
        $('.modal-title').text('Delete');
        $('.did').text($(this).data('id'));
        $('.deleteContent').show();
        $('.form-horizontal').hide();
        $('.dname').html($(this).data('name'));
        $('#myModal').modal('show');
});

$('.modal-footer').on('click', '.delete', function() {
        $.ajax({
            type: 'delete',
            url: '/inventories',
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $('.did').text()
            },
            success: function(data) {
                $('.item' + $('.did').text()).remove();
            }
        });
    });

</script>
@endsection