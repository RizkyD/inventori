@extends('layouts.app')

@section('content')
<!-- Form Add New Inventory -->
<div class="card mb-3">
    <div class="card-header">
    <i class="fas fa-table"></i>
    Add New @yield('addType')
    </div>
    <div class="card-body">
    <p class="error text-center alert alert-danger" style="display:none"></p>
    @csrf
    @yield('form')
    </div>
</div>

<!-- DataTables Example -->
<div class="card mb-3">
    <div class="card-header"><i class="fas fa-table"></i>@yield('headerType') List</div>
    <div class="card-body">
        <div class="table-responsive">
            <table id="example" class="table table-striped table-bordered nowrap" style="width:100%">
                @yield('table')
            </table>
        </div>
    </div>
    <div class="card-footer small text-muted">Updated @yield('dateUpdate')</div>
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
                @yield('formModal')
            </div>
        </div>
    </div>
</div>
@endsection