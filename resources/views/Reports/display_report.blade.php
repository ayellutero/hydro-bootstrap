
<div>

	<!-- FIX FORM -->
		 <div class="form-group">
	        {!! Form::label('station_name', 'Station Name:') !!}
	        {{ $report->station_name }}
	    </div>
	    <div class="form-group">
	        {!! Form::label('location', 'Location (Town, Province):') !!}
	        {{ $report->location }}

	    </div>
		<div class="form-group">
	        {!! Form::label('sensor_type', 'Sensor Type:') !!}   
			{{ $report->sensor_type }}
		</div>
	
		<h4 class="header2" style="padding-top:2%">INITIAL ASSESSMENT</h4>
		<div class="form-group">
	        {!! Form::label('date_assessed', 'Date Assessed:') !!}
	        {{ $report->date_assessed }}

	    </div>
		<div class="form-group">
	        {!! Form::label('problem', 'Problem/s:') !!}
	        {{ $report->problem }}
	    </div>
		<div class="form-group">
	        {!! Form::label('work_tdone', 'Work/s to be done:') !!}
	        {{ $report->work_tdone }}
	    </div>
		<div class="form-group">
	        {!! Form::label('last_data', 'Last Data:') !!}
	        {{ $report->last_data }}
	    </div>
		<div class="form-group">
	        {!! Form::label('init_remarks', 'Remarks:') !!}
	        {{ $report->init_remarks }}
	    </div>

		<h4 class="header2" style="padding-top:2%">ONSITE VISIT</h4>
		<div class="form-group">
	        {!! Form::label('date_visited', 'Date Visited:') !!}
	        {{ $report->date_visited }}
	    </div>
	    <div class="form-group">
	        {!! Form::label('actual_defects', 'Actual Defect/s:') !!}
	   		{{ $report->actual_defects }}
	    </div>
		<div class="form-group">
	        {!! Form::label('work_done', 'Work/s done:') !!}
	        {{ $report->work_done }}
	    </div>
	    <div class="form-group">
	        {!! Form::label('part_replaced', 'Part/s Replaced (if any):') !!}
	        {{ $report->part_replaced }}
	    </div>
	    <div class="form-group">
	        {!! Form::label('tp_results', 'Test Points Results (if performed):') !!}
	        {{ $report->tp_results }}
	    </div>
	    <div class="form-group">
	        {!! Form::label('rc_performed', 'Remote Commands Performed:') !!}
	        {{ $report->rc_performed }}
	    </div>
		<div class="form-group">
	        {!! Form::label('onsite_remarks', 'Remarks:') !!}
	        {{ $report->onsite_remarks }}
	    </div><br>

	    <div class="form-group"  style="padding-top:2%">
	        {!! Form::label('conducted_by', 'Conducted by:') !!}
	        {{ $report->conducted_by }}, {{ $report->c_position }}
	    </div>

	    <div class="form-group">
	        {!! Form::label('noted_by', 'Noted by:') !!}
	       {{ $report->noted_by }}, {{ $report->n_position }}
	    </div>
        <br><br>

</div>
