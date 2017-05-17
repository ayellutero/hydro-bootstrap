<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Device ID:</strong>
            {!! Form::text('device_id', $station->device_id, array('placeholder' => 'Device ID','class' => 'form-control')) !!}
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Location:</strong>
            {!! Form::text('location', $station->location, array('placeholder' => 'Location','class' => 'form-control')) !!}
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Province:</strong>
            {!! Form::text('province', $station->province, array('placeholder' => 'Province','class' => 'form-control')) !!}
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Latitude:</strong>
            {!! Form::text('lat', $station->lat, array('placeholder' => 'Latitude','class' => 'form-control')) !!}
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Longitude:</strong>
            {!! Form::text('lng', $station->lng, array('placeholder' => 'Longitude','class' => 'form-control')) !!}
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Status:</strong>
            <select class="form-control" name="status" id="status">
                @foreach($statuses as $status)
                <option value="{{ $status->status}}">{{ $status->status}}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Type:</strong>
            <select class="form-control" name="type" id="type">
                @foreach($types as $type)
                <option value="{{ $type->type}}">{{ $type->type}}</option>
                @endforeach
            </select>
        </div>
    </div>
    
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Sim Network:</strong>
            <select class="form-control" name="sim">
                <option value ="Globe">Globe</option>
                <option value ="Smart">Smart</option>
            </select>
        </div>
    </div><br>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Elevation:</strong>
            {!! Form::text('elevation', $station->elevation, array('placeholder' => 'Elevation','class' => 'form-control')) !!}
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Date of Deployment:</strong>
            {!! Form::date('date_deployed', $station->date_deployed, array('placeholder' => 'Date of Deployment','class' => 'form-control')) !!}
        </div>
    </div>
</div>

