@extends('layouts.app')

@section('title','Inventory - Users Management')

@section('breadcrumb','Management')

@section('breadcrumb-active','Users')

@section('content')
<!-- Form Add New User -->
<div class="card mb-3">
    <div class="card-header">
    <i class="fas fa-table"></i>
    Add New User
    </div>
    <div class="card-body">
    <form>
        <div class="form-group">
        <label for="InputName">Name</label>
        <input type="text" class="form-control" id="InputName" placeholder="Enter Name">
        </div>
        <div class="form-group">
            <label for="InputUsername">Username</label>
            <input type="text" class="form-control" id="InputUsername" placeholder="Enter Username">
        </div>
        <div class="form-group">
            <label for="InputAddress">Address</label>
            <textarea class="form-control" id="InputAddress" rows="3" placeholder="Enter Address"></textarea>
        </div>
        <div class="form-group" style="max-width:100px;">
            <label for="InputRole">Role</label>
            <select class="form-control" id="InputRole">
            <option>Admin</option>
            <option>Operator</option>
            <option>Peminjam</option>
            </select>
        </div>
        
        <button type="submit" class="btn btn-primary mb-3"  id="add" >Submit</button>
    </form>
    </div>

</div>

<!-- DataTables Example -->
<div class="card mb-3">
    <div class="card-header">
    <i class="fas fa-table"></i>
    User List</div>
    <div class="card-body">
    <div class="table-responsive">
        <table id="example" class="table table-striped table-bordered nowrap" style="width:100%">
            <thead>
                <tr>
                    <th>Reg Number</th>
                    <th>Name</th>
                    <th>Username</th>
                    <th>Address</th>
                    <th>Role</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>12020230</td>
                    <td>Dedi Ardiansyah</td>
                    <td>dediardiansyah</td>
                    <td>Jl.Cisekai No.599</td>
                    <td>Admin</td>
                    <td>
                        <button class="edit-modal btn btn-info" 
                            data-id="1" 
                            data-username="Dediardiansyah"
                            data-name="Dedi Ardiansyah"
                            data-address="Jl.Cisekai No.599"
                            data-role="admin"
                        >
                            <i class="fas fa-edit"></i>
                        </button>
                        <button class="delete-modal btn btn-danger" 
                            data-id="1" 
                            data-username="Dediardiansyah"
                            data-name="Dedi Ardiansyah"
                            data-address="Jl.Cisekai No.599"
                            data-role="admin"
                        >
                            <i class="fas fa-trash"></i>
                        </button>
                        <button class="btn btn-info"><i class="fas fa-key"></i></button>
                    </td>
                </tr>
                <tr>
                    <td>12020230</td>
                    <td>Dedi Ardiansyah</td>
                    <td>dediardiansyah</td>
                    <td>Jl.Cisekai No.599</td>
                    <td>Admin</td>
                    <td>
                        <td>
                        <button class="edit-modal btn btn-info" 
                            data-id="1" 
                            data-username="Dediardiansyah"
                            data-name="Dedi Ardiansyah"
                            data-address="Jl.Cisekai No.599"
                            data-role="admin"
                        >
                            <i class="fas fa-edit"></i>
                        </button>
                        <button class="delete-modal btn btn-danger" 
                            data-id="1" 
                            data-username="Dediardiansyah"
                            data-name="Dedi Ardiansyah"
                            data-address="Jl.Cisekai No.599"
                            data-role="admin"
                        >
                            <i class="fas fa-trash"></i>
                        </button>
                        <button class="btn btn-info"><i class="fas fa-key"></i></button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    </div>
    <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
</div>
@endsection