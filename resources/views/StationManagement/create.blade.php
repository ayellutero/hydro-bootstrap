<div class="row">
    <div class="form-group{{ $errors->has('device_id') ? ' has-error' : '' }}">
        <label for="device_id" class="col-md-4 control-label">Device ID</label>
        
        <div class="col-md-6">
            <input id="device_id" type="text" class="form-control" name="device_id" required autofocus>
            
            @if ($errors->has('device_id'))
            <span class="help-block">
                <strong>{{ $errors->first('device_id') }}</strong>
            </span>
            @endif
        </div>
    </div><br>

    <div class="form-group{{ $errors->has('location') ? ' has-error' : '' }}">
        <label for="location" class="col-md-4 control-label">Location</label>
        
        <div class="col-md-6">
            <input id="location" type="text" class="form-control" name="location" required>
            
            @if ($errors->has('location'))
            <span class="help-block">
                <strong>{{ $errors->first('location') }}</strong>
            </span>
            @endif
        </div>
    </div><br>

    <div class="form-group{{ $errors->has('province') ? ' has-error' : '' }}">
        <label for="province" class="col-md-4 control-label">Province</label>
        
        <div class="col-md-6">
            <input id="province" type="text" class="form-control" name="province" required>
            
            @if ($errors->has('province'))
            <span class="help-block">
                <strong>{{ $errors->first('province') }}</strong>
            </span>
            @endif
        </div>
    </div><br>

    <div class="form-group{{ $errors->has('type') ? ' has-error' : '' }}">
        <label for="type" class="col-md-4 control-label">Type</label>
        
        <div class="col-md-6">
            <select class="form-control" name="type" id="type">
                @foreach($types as $type)
                <option value="{{ $type->type}}">{{ $type->type}}</option>
                @endforeach
            </select>

            @if ($errors->has('type'))
            <span class="help-block">
                <strong>{{ $errors->first('type') }}</strong>
            </span>
            @endif
        </div>
    </div><br>

    <div class="form-group{{ $errors->has('lat') ? ' has-error' : '' }}">
        <label for="lat" class="col-md-4 control-label">Latitude</label>
        
        <div class="col-md-6">
            <input id="lat" type="text" class="form-control" name="lat" required>
            
            @if ($errors->has('lat'))
            <span class="help-block">
                <strong>{{ $errors->first('lat') }}</strong>
            </span>
            @endif
        </div>
    </div><br>

    <div class="form-group{{ $errors->has('lng') ? ' has-error' : '' }}">
        <label for="lng" class="col-md-4 control-label">Longitude</label>
        
        <div class="col-md-6">
            <input id="lng" type="text" class="form-control" name="lng" required>
            
            @if ($errors->has('lng'))
            <span class="help-block">
                <strong>{{ $errors->first('lng') }}</strong>
            </span>
            @endif
        </div>
    </div><br>

    <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
        <label for="status" class="col-md-4 control-label">Status</label>
        
        <div class="col-md-6">
            <select class="form-control" name="status" id="status">
                @foreach($statuses as $status)
                <option value="{{ $status->status}}">{{ $status->status}}</option>
                @endforeach
            </select>

            @if ($errors->has('status'))
            <span class="help-block">
                <strong>{{ $errors->first('status') }}</strong>
            </span>
            @endif
        </div>
    </div><br>

    <div class="form-group{{ $errors->has('sim') ? ' has-error' : '' }}">
        <label for="sim" class="col-md-4 control-label">Sim Network</label>
        
        <div class="col-md-6">
            <select class="form-control" name="sim" id="sim">
                <option value="Smart">Smart</option>
                <option value="Globe">Globe</option>
            </select>

            @if ($errors->has('sim'))
            <span class="help-block">
                <strong>{{ $errors->first('sim') }}</strong>
            </span>
            @endif
        </div>
    </div><br>

    <div class="form-group{{ $errors->has('elevation') ? ' has-error' : '' }}">
        <label for="elevation" class="col-md-4 control-label">Elevation</label>
        
        <div class="col-md-6">
            <input id="elevation" type="text" class="form-control" name="elevation">
            
            @if ($errors->has('elevation'))
            <span class="help-block">
                <strong>{{ $errors->first('elevation') }}</strong>
            </span>
            @endif
        </div>
    </div><br>

    <div class="form-group{{ $errors->has('date_deployed') ? ' has-error' : '' }}">
        <label for="date_deployed" class="col-md-4 control-label">Date Deployed</label>
        
        <div class="col-md-6">
            <input id="date_deployed" type="date" class="form-control" name="date_deployed" value="date_deployed">
            
            @if ($errors->has('date_deployed'))
            <span class="help-block">
                <strong>{{ $errors->first('date_deployed') }}</strong>
            </span>
            @endif
        </div>
    </div><br>
</div>