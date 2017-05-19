@extends('layouts.app')

@section('pageTitle', 'All Users')

@section('content')

@if(Session::has('success'))
<div class="alert alert-success alert-dismissable">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>{{ Session::get('success') }}</strong>
</div>
@endif

<!-- /.row -->
<div class="row" style="margin:0%; margin-top:0%;">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <a class="btn withTooltip" data-container="body" style="z-index:1000; position:relative" title="New" data-toggle="modal" data-target="#createUser"><i class="fa fa-user-plus fa-2x" aria-hidden="true"></i></a>
                Users
            </div>

            <div class="panel-body">
                <table id="all-users" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Employee ID</th>
                            <th>Name</th>
                            <th>Designation</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($users as $key => $user)
                        <tr>
                            <td>{{ $user->employee_id }}</td>
                            <td>{{ $user->firstname }} {{ $user->lastname }}</td>
                            <td>{{ $user->designation }}</td>
                            <td>
                                <a class="btn withTooltip" data-container="body" style="z-index:1000; position:relative" title="View" data-toggle="modal" data-target="#viewUser-<?= $user->id?>"><i class="fa fa-eye fa-2x" aria-hidden="true"></i></a>
                                <a class="btn withTooltip" data-container="body" style="z-index:1000; position:relative" title="Edit" data-toggle="modal" data-target="#editUser-<?= $user->id?>"><i class="fa fa-pencil-square-o fa-2x" aria-hidden="true"></i></a>
                                {!! Form::open(['method' => 'DELETE','route' => ['userCRUD.destroy', $user->id],'style'=>'display:inline']) !!}
                                    <button class="btn withTooltip" data-container="body" style="z-index:1000; position:relative" title="Delete" type="submit">
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
                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                <div class="form-group">
                                                        <a id="changePWButton-{{$user->id}}" class="btn btn-info" onclick="showEditPassword({{$user->id}})">Change Password</a>
                                                    </div>
                                                </div>

                                                <div id="editUserPassword-{{$user->id}}" class="hide">
                                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                                        <div class="form-group">
                                                            <strong>New Password:</strong>
                                                            <input type="password" class="form-control" name="password" id="newPasswordInput">
                                                        </div>
                                                    </div>

                                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                                        <div class="form-group">
                                                            <strong>Confirm Password:</strong>
                                                            <input type="password" class="form-control" name="pass_confirm" id="confPasswordInput">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> <!-- Closing tag for the div class row in the UserCRUD.edit -->
                                        
                                        <div class="modal-footer">
                                            <button class="btn btn-success" type="submit" name="action">Save Changes</button>
                                            <button type="button" class="btn btn-danger" data-dismiss="modal" id="cancel-button">Cancel</button>
                                            {{ Form::close() }}
                                        </div>
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
                                        <button class="btn btn-success" type="submit" name="action">Add</button>
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

   <script>
        function showEditPassword(usrID){
            var str1 = 'cancelPassword(';
            var str2 = ')';
            
            $('#editUserPassword-'+usrID).attr('class', '');
            $('#changePWButton-'+usrID).html('Cancel');
            $('#changePWButton-'+usrID).attr('onclick', str1.concat(usrID, str2));
        }
        function cancelPassword(usrID){
            var str1 = 'showEditPassword(';
            var str2 = ')';

            $('#editUserPassword-'+usrID).attr('class', 'hide');
            $('#changePWButton-'+usrID).html('Change Password');
            $('#changePWButton-'+usrID).attr('onclick', str1.concat(usrID, str2));
        }
    </script>
@endsection