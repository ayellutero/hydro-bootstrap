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
                                                Staff
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
                                <strong>Designation:</strong>
                                {!! Form::text('designation', Auth::user()->designation, array('placeholder' => 'Designation','class' => 'form-control')) !!}
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
                                <div class="form-group hide">
                                    <strong>Role:</strong></br>
                                    <input type="checkbox" class="filled-in" {{Auth::user()->hasRole('User') ? 'checked' : '' }} name="role_user" id="role_user"><label for="role_user">User</label></br>
                                    <input type="checkbox" class="filled-in" {{ Auth::user()->hasRole('Admin') ? 'checked' : '' }} name="role_admin" id="role_admin"><label for="role_admin">Admin</label></br>
                                </div>
                            </div>
                        @endif

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <a id="changePWButton" class="btn btn-info" onclick="showEditPassword()">Change Password</a>
                            </div>
                        </div>

                        <div id="editUserPassword" class="hide">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>New Password (must be at least 6 characters):</strong>
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

                        <script>
                            function showEditPassword(){
                                $('#editUserPassword').attr('class', '');
                                $('#changePWButton').html('Cancel');
                                $('#changePWButton').attr('onclick', 'cancelPassword()');
                                $('#newPasswordInput').attr('required', true);
                                $('#confPasswordInput').attr('required', true);
                            }
                            function cancelPassword(){
                                $('#editUserPassword').attr('class', 'hide');
                                $('#changePWButton').html('Change Password');
                                $('#changePWButton').attr('onclick', 'showEditPassword()');
                                $('#newPasswordInput').attr('required', false);
                                $('#confPasswordInput').attr('required', false);
                            }
                        </script>
                    </div>
                </div>

                <div class="modal-footer">
                        <button class="btn btn-success" type="submit" name="action">Save Changes</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal" id="cancel-button">Cancel</button>
                </div>

                <div class="hide">
                    <!-- USER ACTIVITY -->
                    <?php  $time = Carbon\Carbon::now(new DateTimeZone('Asia/Singapore')); ?>
                    {!! Form::text('empID', Auth::user()->employee_id,['class'=>'form-control', 'readonly'=>'true', 'hidden'=>'true']) !!}
                    {!! Form::text('employee_position', Auth::user()->designation,['class'=>'form-control', 'readonly'=>'true', 'hidden'=>'true']) !!}
                    {!! Form::text('employee_name', Auth::user()->firstname.' '.Auth::user()->lastname,['class'=>'form-control', 'readonly'=>'true', 'hidden'=>'true']) !!}
                    {!! Form::text('activity', 'Edited his/her profile', ['class'=>'form-control', 'readonly'=>'true', 'hidden'=>'true']) !!}	
                    {!! Form::text('sent_at_date', $time->toDateString(),['class'=>'form-control datepicker', 'readonly'=>'true', 'hidden'=>'true']) !!}	
                    {!! Form::text('sent_at_time', $time->toTimeString(),['class'=>'form-control datepicker', 'readonly'=>'true', 'hidden'=>'true']) !!}
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
@endsection