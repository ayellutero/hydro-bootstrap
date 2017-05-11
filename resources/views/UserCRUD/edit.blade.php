<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Employee ID:</strong>
            {!! Form::text('employee_id', $user->employee_id, array('placeholder' => 'Employee ID','class' => 'form-control', 'disabled' => 'disabled')) !!}
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
            <strong>Position/Permission:</strong></br>
            <input type="checkbox" class="filled-in" {{ $user->hasRole('User') ? 'checked' : '' }} name="role_user" id="role_user"><label for="role_user">User</label></br>
            <input type="checkbox" class="filled-in" {{ $user->hasRole('Head') ? 'checked' : '' }} name="role_head" id="role_head"><label for="role_head">Head</label></br>
            <input type="checkbox" class="filled-in" {{ $user->hasRole('Admin') ? 'checked' : '' }} name="role_admin" id="role_admin"><label for="role_admin">Admin</label></br>
        </div><br>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Password:</strong>
            <a class="btn btn-primary" id="pw_btn">Change</a>
            <input type="password" id="pw_change">
        </div>
    </div><br>

    <div class="hide">
        <!-- USER ACTIVITY -->
        <?php  $time = Carbon\Carbon::now(new DateTimeZone('Asia/Singapore')); ?>
        <!--{!! Form::text('employee_id', Auth::user()->employee_id,['class'=>'form-control', 'readonly'=>'true', 'hidden'=>'true']) !!}
        {!! Form::text('position', Auth::user()->position,['class'=>'form-control', 'readonly'=>'true', 'hidden'=>'true']) !!}
        {!! Form::text('employee_name', Auth::user()->firstname.' '.Auth::user()->lastname,['class'=>'form-control', 'readonly'=>'true', 'hidden'=>'true']) !!}
        {!! Form::text('activity', 'Edited '.$user->firstname.' '.$user->lastname."'s (".$user->employee_id.') profile', ['class'=>'form-control', 'readonly'=>'true', 'hidden'=>'true']) !!}	
        {!! Form::text('sent_at_date', $time->toDateString(),['class'=>'form-control datepicker', 'readonly'=>'true', 'hidden'=>'true']) !!}	
        {!! Form::text('sent_at_time', $time->toTimeString(),['class'=>'form-control datepicker', 'readonly'=>'true', 'hidden'=>'true']) !!}-->
    </div>
</div>

