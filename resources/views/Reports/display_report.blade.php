
<div>

	<!-- FIX FORM -->
		 <div class="form-group">
			{!! Form::label('station_name', 'ID:') !!}
			{{ $report->station_id }}
		</div>

	    <div class="form-group">
	        {!! Form::label('location', 'Location (Town, Province):') !!}
			{{ $report->location }}
	    </div>
		
		<h4 class="header2" style="padding-top:2%">PRE-REPAIR</h4>
		<div class="form-group">
	        {!! Form::label('monitoring_date', 'Date of Monitoring:') !!}
	        {{ $report->monitoring_date }}
	    </div>

		<div class="form-group">
	        {!! Form::label('init_findings', 'Initial Findings:') !!}
	        {{ $report->init_findings }}
	    </div>

		<div class="form-group">
	        {!! Form::label('rec_work', 'Recommended Work/s to be done:') !!}
	        {{ $report->rec_work }}
	    </div>

		<div class="form-group">
	        {!! Form::label('last_data', 'Last Date of Data:') !!}
	        {{ $report->last_data }}
	    </div>

		<div class="form-group">
	        {!! Form::label('assessed_by', 'Assessed by:') !!}
	        {{ $report->assessed_by }}
		</div>

		<h4 class="header2" style="padding-top:2%">POST REPAIR</h4>
		<div class="form-group">
	        {!! Form::label('onsite_date', 'Date of Onsite:') !!}
	        {{ $report->onsite_date }}
	    </div>

	    <div class="form-group">
	        {!! Form::label('actual_findings', 'Actual Findings:') !!}
	        {{ $report->actual_findings }}
	    </div>

		<div class="form-group">
	        {!! Form::label('work_done', 'Work/s done:') !!}
			{{ $report->work_done }}	    
		</div>

	    <div class="form-group">
	        {!! Form::label('part_installed', 'Parts Replaced/Installed:') !!}
	        {{ $report->part_installed }}
	    </div>

	    <div class="form-group">
	        {!! Form::label('status', 'Status: ') !!}
	        {{ $report->status }}
		</div>

	    <div class="form-group"  style="padding-top:2%">
			{!! Form::label('conducted_by', 'Conducted by:') !!}
			{{ $report->conducted_by }}
		</div>

		<div class="form-group"  style="padding-top:2%">
			{!! Form::label('supervisor', 'Verified by:') !!}
			{{ $report->supervisor }}
		</div>
        <br><br>

</div>
