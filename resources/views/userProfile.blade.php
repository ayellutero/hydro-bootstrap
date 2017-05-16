@extends('layouts.app')

@section('pageTitle', 'Profile')

@section('content')
    <div class="row" style="margin:0%; margin-top:0%;">
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title">Personal Info</h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-3 col-lg-3 " align="center"> <img alt="User Pic" src="https://www.chalopadho.com/assets/default_avatar.png" class="img-circle img-responsive"> </div>
                            <div class=" col-md-9 col-lg-9 "> 
                                <table class="table table-user-information">
                                    <tbody>
                                        <tr>
                                            <td>Name</td>
                                            <td>{{ Auth::user()->firstname }} {{ Auth::user()->lastname }}</td>
                                        </tr>
                                        <tr>
                                            <td>Employee ID</td>
                                            <td>{{ Auth::user()->employee_id }}</td>
                                        </tr>
                                        <tr>
                                            <td>Position</td>
                                            <td>{{ Auth::user()->position }}</td>
                                        </tr>
                                        <tr>
                                            <td>Email</td>
                                            <td>{{ Auth::user()->email }}</td>
                                        </tr>
                                        <tr>
                                            <td>Contact Number</td>
                                            <td>{{ Auth::user()->contact_num }}</td>
                                        </tr>
                                        <tr>
                                            <td>Permissions</td>
                                            <td>
                                                @if ( Auth::user()->hasRole('User') ? 'checked' : '' )
                                                User
                                                @endif
                                                -
                                                @if ( Auth::user()->hasRole('Head') ? 'checked' : '' )
                                                Head
                                                @endif
                                                -
                                                @if ( Auth::user()->hasRole('Admin') ? 'checked' : '' )
                                                Admin
                                                @endif
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer">
                        <a href="#editProfile" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#editProfile" id="datata"><i class="glyphicon glyphicon-edit"> Edit Profile</i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Profile Modal -->
    <div id="editProfile" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Personal Info</h4>
                </div>

                    {!! Form::model(Auth::user(), ['method' => 'POST','route' => ['userCRUD.update', Auth::user()->id]]) !!}
                <div class="modal-body">
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

        
                    <div class="row">

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>First Name:</strong>
                                {!! Form::text('firstname', Auth::user()->firstname, array('disabled' => 'disabled', 'placeholder' => 'First Name','class' => 'form-control')) !!}
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Last Name:</strong>
                                {!! Form::text('lastname', Auth::user()->lastname, array('disabled' => 'disabled', 'placeholder' => 'Last Name','class' => 'form-control')) !!}
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Position:</strong>
                                {!! Form::text('position', Auth::user()->position, array('placeholder' => 'Position','class' => 'form-control')) !!}
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Employee ID:</strong>
                                {!! Form::text('employee_id', Auth::user()->employee_id, array('disabled' => 'disabled', 'placeholder' => 'Employee ID','class' => 'form-control')) !!}
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>E-mail:</strong>
                                {!! Form::text('email', Auth::user()->email, array('placeholder' => 'E-mail','class' => 'form-control')) !!}
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Contact Number:</strong>
                                {!! Form::text('contact_num', Auth::user()->contact_num, array('placeholder' => 'Contact #','class' => 'form-control')) !!}
                            </div>
                        </div>

                        @if ( Auth::user()->hasRole('Admin'))
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Position/Permission:</strong></br>
                                    <input type="checkbox" class="filled-in" {{ Auth::user()->hasRole('User') ? 'checked' : '' }} name="role_user" id="role_user"><label for="role_user">User</label></br>
                                    <input type="checkbox" class="filled-in" {{ Auth::user()->hasRole('Head') ? 'checked' : '' }} name="role_head" id="role_head"><label for="role_head">Head</label></br>
                                    <input type="checkbox" class="filled-in" {{ Auth::user()->hasRole('Admin') ? 'checked' : '' }} name="role_admin" id="role_admin"><label for="role_admin">Admin</label></br>
                                </div><br>
                            </div>
                        @endif

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>New Password:</strong>
                                {!! Form::password('password', null, array('placeholder' => 'Password','class' => 'form-control')) !!}
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Confirm Password:</strong>
                            {!! Form::password('pass_confirm', null, array('placeholder' => 'Confirm Password','class' => 'form-control')) !!}
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                        <button class="btn btn-success" type="submit" name="action">Save Changes</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal" id="cancel-button">Cancel</button>
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
@endsection