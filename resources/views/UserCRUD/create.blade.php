<div class="row">
    <div class="form-group{{ $errors->has('firstname') ? ' has-error' : '' }}">
        <label for="firstname" class="col-md-4 control-label">First Name</label>
        
        <div class="col-md-6">
            <input id="firstname" type="text" class="form-control" name="firstname" required autofocus>
            
            @if ($errors->has('firstname'))
            <span class="help-block">
                <strong>{{ $errors->first('firstname') }}</strong>
            </span>
            @endif
        </div>
    </div><br>

    <div class="form-group{{ $errors->has('lastname') ? ' has-error' : '' }}">
        <label for="lastname" class="col-md-4 control-label">Last Name</label>
        
        <div class="col-md-6">
            <input id="lastname" type="text" class="form-control" name="lastname" required>
            
            @if ($errors->has('lastname'))
            <span class="help-block">
                <strong>{{ $errors->first('lastname') }}</strong>
            </span>
            @endif
        </div>
    </div><br>

    <div class="form-group{{ $errors->has('employee_id') ? ' has-error' : '' }}">
        <label for="employee_id" class="col-md-4 control-label">Employee ID</label>
        
        <div class="col-md-6">
            <input id="employee_id" type="text" class="form-control" name="employee_id" required>
            
            @if ($errors->has('employee_id'))
            <span class="help-block">
                <strong>{{ $errors->first('employee_id') }}</strong>
            </span>
            @endif
        </div>
    </div><br>

    <div class="form-group{{ $errors->has('designation') ? ' has-error' : '' }}">
        <label for="designation" class="col-md-4 control-label">Designation</label>
        
        <div class="col-md-6">
            <input id="designation" type="text" class="form-control" name="designation" placeholder="Director, Assistant Director, etc" required>

            @if ($errors->has('designation'))
            <span class="help-block">
                <strong>{{ $errors->first('designation') }}</strong>
            </span>
            @endif
        </div>
    </div><br>

    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
        <label for="email" class="col-md-4 control-label">E-Mail Address</label>
        
        <div class="col-md-6">
            <input id="email" type="email" class="form-control" name="email" required>
            
            @if ($errors->has('email'))
            <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
            @endif
        </div>
    </div><br>

    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
        <label for="password" class="col-md-4 control-label">Password</label>
        
        <div class="col-md-6">
            <input id="password" type="password" class="form-control" name="password" required>
                @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
                @endif
        </div>
    </div><br>

    <div class="form-group{{ $errors->has('pass_confirm') ? ' has-error' : '' }}">
        <label for="pass_confirm" class="col-md-4 control-label">Confirm Password</label>
        
        <div class="col-md-6">
            <input id="password" type="password" class="form-control" name="pass_confirm" required>
                @if ($errors->has('pass_confirm'))
                <span class="help-block">
                    <strong>{{ $errors->first('pass_confirm') }}</strong>
                </span>
                @endif
        </div>
    </div><br>
</div>

<div class="hide">
    <!-- USER ACTIVITY -->
    <?php  $time = Carbon\Carbon::now(new DateTimeZone('Asia/Singapore')); ?>
    {!! Form::text('empID', Auth::user()->employee_id,['class'=>'form-control', 'readonly'=>'true', 'hidden'=>'true']) !!}
    {!! Form::text('employee_position', Auth::user()->designation,['class'=>'form-control', 'readonly'=>'true', 'hidden'=>'true']) !!}
    {!! Form::text('employee_name', Auth::user()->firstname.' '.Auth::user()->lastname,['class'=>'form-control', 'readonly'=>'true', 'hidden'=>'true']) !!}
    {!! Form::text('activity', 'Created a new user', ['class'=>'form-control', 'readonly'=>'true', 'hidden'=>'true']) !!}	
    {!! Form::text('sent_at_date', $time->toDateString(),['class'=>'form-control datepicker', 'readonly'=>'true', 'hidden'=>'true']) !!}	
    {!! Form::text('sent_at_time', $time->toTimeString(),['class'=>'form-control datepicker', 'readonly'=>'true', 'hidden'=>'true']) !!}
</div>