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

    <div class="form-group{{ $errors->has('position') ? ' has-error' : '' }}">
        <label for="position" class="col-md-4 control-label">Position</label>
        
        <div class="col-md-6">
            <select class="form-control" name="position" id="position">
                <option value="User">User</option>
                <option value="Head">Unit Head</option>
                <option value="Admin">Admin</option>
            </select>

            @if ($errors->has('position'))
            <span class="help-block">
                <strong>{{ $errors->first('position') }}</strong>
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

</div>