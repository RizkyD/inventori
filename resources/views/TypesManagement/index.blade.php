@extends('layouts.management')

@section('title','Type - Type Management')

@section('breadcrumb','Management')

@section('breadcrumb-active','Type')

@section('addType','Type')

@section('form')
<div class="form-group">
    <label for="InputName">Name</label>
    <input type="text" class="form-control" id="InputName" name="name" placeholder="Enter Name">
</div>
<div class="form-group">
    <label for="InputDescription">Description</label>
    <textarea class="form-control" id="InputDescription" rows="4" name="description" placeholder="Enter Description"></textarea>
</div>
<button type="submit" class="btn btn-primary mb-3"  id="add" >Submit</button>
@endsection

@section('headerType','Type')

@section('table')
<table id="example" class="table table-striped table-bordered nowrap" style="width:100%">
    <thead>
        <tr>
            <th>Name</th>
            <th>Description</th>
            <th>Created At</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($types as $d)
    <tr class="item{{$d->id}}">
            <td>{{$d->name}}</td>
            <td>{{$d->desc}}</td>
            <td>{{$d->created_at}}</td>
            <td>
                <button class='edit-modal btn btn-info' data-id='{{$d->id}}' data-name='{{$d->name}}' data-description='{{$d->desc}}'><i class='fas fa-edit'></i></button>
                <button class='delete-modal btn btn-danger' data-id='{{$d->id}}' data-name='{{$d->name}}'><i class='fas fa-trash'></i></button>
            </td>
        </tr>
    @endforeach

    </tbody>
</table>
@endsection

@section('dateUpdate','yesterday at 11:59 PM')
@section('formModal')
<form class="form-horizontal" role="form">
    <div class="form-group">
        <label class="control-label col-sm-2" for="id">ID:</label>
        <input type="text" class="form-control" id="id" disabled>
    </div>
    <div class="form-group">
        <label for="updateName">Name</label>
        <input type="text" class="form-control" id="updateName" placeholder="Enter Name">
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
     url: '/types',
     data: {
         '_token': $('input[name=_token]').val(),
         'name': $('input[name=name]').val(),
         'desc': $('#InputDescription').val(),
         
     },

    success: function(data) {
        if ((data.errors)) {
             $('.error').show();
             $('.error').text(data.errors.name);
        } else {
             $('.error').remove();
             $('tbody').prepend("<tr style='background-color:rgba(40,167,69,.5);' class='item" + data.id + "'><td>" + data.name + "</td><td>" + data.desc + "</td><td>" + data.created_at + "</td><td><button class='edit-modal btn btn-info' data-id='" + data.id + "' data-name='" + data.name + "'data-description='" + data.desc + "'><i class='fas fa-edit'></i></button><button class='delete-modal btn btn-danger' data-name'" + data.name + "' data-id='" + data.id + "'><i class='fas fa-trash'></i></button></td></tr>");
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
    $('#updateDescription').val($(this).data('description'));

    $('#myModal').modal('show');
});

$('.modal-footer').on('click', '.edit', function() {

 $.ajax({
     type: 'put',
     url: '/types',
     data: {
         '_token': $('input[name=_token]').val(),
         'id':$('#id').val(),
         'name': $('#updateName').val(),
         'desc': $('#updateDescription').val(),
     },
     success: function(data) {
         $('.item' + data.id).replaceWith("<tr style='background-color:rgba(0,123,255,.5);' class='item" + data.id + "'><td>" + data.name + "</td><td>" + data.desc + "</td><td>" + data.created_at + "</td><td><button class='edit-modal btn btn-info' data-id='" + data.id + "' data-name='" + data.name + "'data-description='" + data.desc + "'><i class='fas fa-edit'></i></button><button class='delete-modal btn btn-danger' data-name='" + data.name + "' data-id='" + data.id + "'><i class='fas fa-trash'></i></button></td></tr>");

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
            url: '/types',
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