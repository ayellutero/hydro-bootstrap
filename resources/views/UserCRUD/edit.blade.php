<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Employee ID:</strong>
            
            {!! Form::text('employee_id', $user->employee_id, array('placeholder' => 'Employee ID','class' => 'form-control', 'disabled' => 'disabled')) !!}
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Designation:</strong>
            <input type="text" name="designation" placeholder="Designation" value="{{$user->designation}}" class="form-control" required />
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>E-mail:</strong>
            <input type="email" name="email" placeholder="E-mail address" value="{{$user->email}}" class="form-control" required />
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Contact Number:</strong>
            {!! Form::text('contact_num', $user->contact_num, array('placeholder' => 'Contact #','class' => 'form-control')) !!}
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Permission:</strong></br>
            <input type="checkbox" class="filled-in" {{ $user->hasRole('User') ? 'checked' : '' }} name="role_user" id="role_user"><label for="role_user">Staff</label></br>
            <input type="checkbox" class="filled-in" {{ $user->hasRole('Admin') ? 'checked' : '' }} name="role_admin" id="role_admin"><label for="role_admin">Admin</label></br>
        </div>
    </div>