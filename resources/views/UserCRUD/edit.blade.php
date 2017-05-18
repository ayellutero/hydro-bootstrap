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
            {!! Form::text('designation', $user->designation, array('placeholder' => 'Designation','class' => 'form-control')) !!}
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>E-mail:</strong>
            {!! Form::email('email', $user->email, array('placeholder' => 'E-mail','class' => 'form-control')) !!}
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
            <input type="checkbox" class="filled-in" {{ $user->hasRole('User') ? 'checked' : '' }} name="role_user" id="role_user"><label for="role_user">User</label></br>
            <input type="checkbox" class="filled-in" {{ $user->hasRole('Admin') ? 'checked' : '' }} name="role_admin" id="role_admin"><label for="role_admin">Admin</label></br>
        </div>
    </div>

    <div class="hide">
        <!-- USER ACTIVITY -->
        <?php  $time = Carbon\Carbon::now(new DateTimeZone('Asia/Singapore')); ?>
        {!! Form::text('empID', Auth::user()->employee_id,['class'=>'form-control', 'readonly'=>'true', 'hidden'=>'true']) !!}
        {!! Form::text('employee_position', Auth::user()->designation,['class'=>'form-control', 'readonly'=>'true', 'hidden'=>'true']) !!}
        {!! Form::text('employee_name', Auth::user()->firstname.' '.Auth::user()->lastname,['class'=>'form-control', 'readonly'=>'true', 'hidden'=>'true']) !!}
        {!! Form::text('activity', 'Edited '.$user->firstname.' '.$user->lastname."'s (".$user->employee_id.') profile', ['class'=>'form-control', 'readonly'=>'true', 'hidden'=>'true']) !!}	
        {!! Form::text('sent_at_date', $time->toDateString(),['class'=>'form-control datepicker', 'readonly'=>'true', 'hidden'=>'true']) !!}	
        {!! Form::text('sent_at_time', $time->toTimeString(),['class'=>'form-control datepicker', 'readonly'=>'true', 'hidden'=>'true']) !!}
    </div>
</div>

