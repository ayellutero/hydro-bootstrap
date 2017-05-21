<div class="row" style="padding:10px">
    <h5 style="text-align: center">
    Department of Science and Technology Regional Office No. IV-A <br>
    Jamboree Road, Timugan, Los Baños, Laguna
    </h5>

    <h4 style="text-align: center; margin-top:15px">
        <strong>HYDROMET STATION MAINTENANCE REPORT</strong>
    </h4>
    <br>
    <div id="stationDetails" class="form-group">
        {!! Form::label('station_id', 'Station ID:') !!}
		<input class="form-control" value="{{ $report->station_id}}" readonly/>
       	{!! Form::label(null, 'Station Type:') !!}
		   <input class="form-control" value="{{ $report->sensor_type}}" readonly/>
        {!! Form::label(null, 'Location:') !!}
		<input class="form-control" value="{{ $report->station_name.', '.$report->location}}" readonly/>
    </div>
    <br>
    <h5 style="text-align: center;">
        <strong>PRE-REPAIR</strong>
    </h5>

	<div class="form-group">
		{!! Form::label('monitoring_date', 'Date of Monitoring:') !!}
		<input class="form-control" value="{{ $report->monitoring_date }}" readonly/>
	</div>

	<div class="form-group">
		{!! Form::label('init_findings', 'Initial Findings:') !!}
		<input class="form-control" value="{{ $report->init_findings }}" readonly/>
	</div>

	<div class="form-group">
		{!! Form::label('rec_work', 'Recommended Work/s to be done:') !!}
		<input class="form-control" value="{{ $report->rec_work }}" readonly/>
	</div>

	<div class="form-group">
		{!! Form::label('last_data', 'Last Date of Data:') !!}
		<input class="form-control" value="{{ $report->last_data }}" readonly/>
	</div>

	<div class="form-group">
		{!! Form::label('assessed_by', 'Assessed by:') !!}
		<input class="form-control" value="{{ $report->assessed_by }}" readonly/>
	</div>

	<br>
    <h5 style="text-align: center;">
        <strong>POST REPAIR</strong>
    </h5>

	<div class="form-group">
		{!! Form::label('onsite_date', 'Date of Onsite:') !!}
		<input class="form-control" value="{{ $report->onsite_date }}" readonly/>
	</div>

	<div class="form-group">
		{!! Form::label('actual_findings', 'Actual Findings:') !!}
		<input class="form-control" value="{{ $report->actual_findings }}" readonly/>
	</div>

	<div class="form-group">
		{!! Form::label('work_done', 'Work/s done:') !!}
		<input class="form-control" value="{{ $report->work_done }}" readonly/>	    
	</div>

	<div class="form-group">
		{!! Form::label('part_installed', 'Parts Replaced/Installed:') !!}
		<input class="form-control" value="{{ $report->part_installed }}" readonly/>
	</div>

	<div class="form-group">
		{!! Form::label('status', 'Status: ') !!}
		<input class="form-control" value="{{ $report->status }}" readonly/>
	</div>

	<div class="form-group"  style="padding-top:2%">
		{!! Form::label('conducted_by', 'Conducted by:') !!}
		<input class="form-control" value="{{ $report->conducted_by }}" readonly/>
	</div>

	<div class="form-group"  style="padding-top:2%">
		{!! Form::label('supervisor', 'Verified by:') !!}
		<input class="form-control" value="{{ $report->supervisor }}" readonly/>
	</div>

</div>