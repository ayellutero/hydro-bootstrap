@extends('layouts.app')
 
@section('content')

<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <a class="btn" data-toggle="modal" data-target="#createUser"><i class="fa fa-user-plus fa-2x" aria-hidden="true"></i></a>
                User CRUD
            </div>

            <div class="panel-body">
                <table id="all-users" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Employee ID</th>
                            <th>Name</th>
                            <th>Position</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($users as $key => $user)
                        <tr>
                            <td>{{ $user->employee_id }}</td>
                            <td>{{ $user->firstname }} {{ $user->lastname }}</td>
                            <td>{{ $user->position }}</td>
                            <td>
                                <a class="btn" data-toggle="modal" data-target="#viewUser-<?= $user->id?>"><i class="fa fa-eye fa-2x" aria-hidden="true"></i></a>
                                <a class="btn" data-toggle="modal" data-target="#editUser-<?= $user->id?>"><i class="fa fa-pencil-square-o fa-2x" aria-hidden="true"></i></a>
                                {!! Form::open(['method' => 'DELETE','route' => ['userCRUD.destroy', $user->id],'style'=>'display:inline']) !!}
                                    <button class="btn" type="submit">
                                        <i class="fa fa-trash fa-2x" aria-hidden="true"></i>
                                    </button>
                                {!! Form::close() !!}
                            </td>
                        </tr>
                        
                        <!-- View User Modal -->
                        <div id="viewUser-<?= $user->id?>" class="modal fade" role="dialog">
                            <div class="modal-dialog">

                                <!-- Modal content-->
                                <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">{{ $user->firstname }} {{ $user->lastname }}</h4>
                                </div>
                                <div class="modal-body">
                                    @include('UserCRUD.show')
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                                </div>

                            </div>
                        </div>

                        <!-- Edit User Modal -->
                        <div id="editUser-<?= $user->id?>" class="modal fade" role="dialog">
                            <div class="modal-dialog">

                                <!-- Modal content-->
                                <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Edit User {{ $user->firstname }} {{ $user->lastname }}</h4>
                                </div>
                                <div class="modal-body">
                                    {!! Form::model($user, ['method' => 'POST','route' => ['userCRUD.update', $user->id]]) !!}
                                    @include('UserCRUD.edit')
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-success" type="submit" name="action">Save Changes</button>
                                    <button type="button" class="btn btn-danger" data-dismiss="modal" id="cancel-button">Cancel</button>
                                    {{ Form::close() }}
                                </div>
                                </div>

                            </div>
                        </div>

                        <!-- Create User Modal -->
                        <div id="createUser" class="modal fade" role="dialog">
                            <div class="modal-dialog">

                                <!-- Modal content-->
                                <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">New User</h4>
                                </div>
                                <div class="modal-body">
                                    {!! Form::open(array('route' => 'userCRUD.store','method'=>'POST', 'class' => 'form-horizontal')) !!}
                                    @include('UserCRUD.create')
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-success" type="submit" name="action">Create User</button>
                                    <button type="button" class="btn btn-danger" data-dismiss="modal" id="cancel-button">Cancel</button>
                                    {{ Form::close() }}
                                </div>
                                </div>

                            </div>
                        </div>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


@endsection