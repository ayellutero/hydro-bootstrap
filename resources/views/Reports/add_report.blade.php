@extends('layouts.app')

@section('pageTitle', 'New Report')

@section('content')

@if(Session::has('message'))
<div class="alert alert-success alert-dismissable">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>{{ Session::get('message') }}</strong>
</div>
@endif

<div class="card-panel" style="margin:1.5%; text-align: center;">
    <h5>ADD NEW REPORT</h5>
</div>

<div class="card-panel" style="margin:1.5%">
	<!-- FIX FORM -->
	{!! Form::open(['url' => 'reports']) !!}
		<div class="hide">
			{!! Form::text('emp_id',Auth::user()->employee_id,['class'=>'form-control', 'hidden' =>'true', 'readonly'=>'true']) !!}
		</div>
		<div class="form-group">
			{!! Form::label('station_name', 'Station:') !!}
			<select class="form-control" name="station_name" id="title" required>
				@foreach($stations as $station)
					<option value ="{{$station->location}}">
						{{ $station->device_id . " " . $station->location }}, {{$station->province}}
						{!! Form::label('location', 'aa',['class'=>'form-control', 'required' => 'true']) !!}
					</option>
				@endforeach
			</select>
		</div>

	    <div class="form-group">
	        <!--{!! Form::label('location', 'Location (Town, Province):') !!}-->
			<!--<select class="form-control" name="location" required>
				@foreach($stations as $station)
					<option value ="{{$station->province}}">{{ $station->province }}</option>
				@endforeach
			</select>-->
	        <!--{!! Form::text('location', null,['class'=>'form-control', 'required' => 'true']) !!}-->
	    </div>

		<div class="form-group">
	        {!! Form::label('sensor_type', 'Sensor Type:') !!}   
			<select class="form-control" name="sensor_type" id="sensor_type" required>
			  <option value ="ARG">ARG</option>
			  <option value ="WLMS">WLMS</option>
			  <option value ="TDM">TDM</option>
			  <option value ="AWS">AWS</option>
            </select>
		</div>
		
		<h4 class="header2" style="padding-top:2%">INITIAL ASSESSMENT</h4>
		<div class="form-group">
	        {!! Form::label('date_assessed', 'Date Assessed:') !!}
	        <input type="date" name="date_assessed" class="datepicker" value="date_assessed" required>

	    </div>

		<div class="form-group">
	        {!! Form::label('problem', 'Problem/s:') !!}
	        {!! Form::textarea('problem', null,['class'=>'form-control', 'required' => 'true']) !!}
	    </div>

		<div class="form-group">
	        {!! Form::label('work_tdone', 'Work/s to be done:') !!}
	        {!! Form::textarea('work_tdone', null,['class'=>'form-control', 'required' => 'true']) !!}
	    </div>

		<div class="form-group">
	        {!! Form::label('last_data', 'Date of last data transmission:') !!}
	        <input type="date" name="last_data" class="datepicker" value="last_data" required>
	    </div>

		<div class="form-group">
	        {!! Form::label('init_remarks', 'Remarks:') !!}
	        {!! Form::textarea('init_remarks', null,['class'=>'form-control', 'required' => 'true']) !!}
	    </div>

		<h4 class="header2" style="padding-top:2%">ONSITE VISIT</h4>
		<div class="form-group">
	        {!! Form::label('date_visited', 'Date Visited:') !!}
	        <input type="date" name="date_visited" class="datepicker" value="date_visited" required>
	    </div>

	    <div class="form-group">
	        {!! Form::label('actual_defects', 'Actual Defect/s:') !!}
	        <select class="form-control" name="actual_defects" id="actual_defects" required>
			<option value ="None">None</option>
			  <option value ="Defect 1">Defect 1</option>
			  <option value ="Defect 2">Defect 2</option>
			  <option value ="Defect 3">Defect 3</option>
			  <option value ="Defect 4">Defect 4</option>
            </select>
	    </div>

		<div class="form-group">
	        {!! Form::label('work_done', 'Work/s done:') !!}
	        {!! Form::textarea('work_done', null,['class'=>'form-control', 'required' => 'true']) !!}
	    </div>

	    <div class="form-group">
	        {!! Form::label('part_replaced', 'Part/s Replaced (if any):') !!}
	        <!--{!! Form::textarea('part_replaced', null,['class'=>'form-control']) !!}-->
			<select class="form-control" name="part_replaced" id="part_replaced" required>
			<option value ="None">None</option>
			  <option value ="Part 1">Part 1</option>
			  <option value ="Part 2">Part 2</option>
			  <option value ="Part 3">Part 3</option>
			  <option value ="Part 4">Part 4</option>
            </select>
	    </div>

	    <div class="form-group">
	        {!! Form::label('tp_results', 'Test Points Results (if performed):') !!}
	        {!! Form::textarea('tp_results', null,['class'=>'form-control']) !!}
	    </div>

	    <div class="form-group">
	        {!! Form::label('rc_performed', 'Remote Commands Performed:') !!}
	        {!! Form::textarea('rc_performed', null,['class'=>'form-control']) !!}
	    </div>

		<div class="form-group">
	        {!! Form::label('onsite_remarks', 'Remarks:') !!}
	        {!! Form::textarea('onsite_remarks', null,['class'=>'form-control', 'required' => 'true']) !!}
	    </div><br>

	    <div class="form-group"  style="padding-top:2%">
			{!! Form::label('conducted_by', 'Conducted by:') !!}
			{!! Form::text('conducted_by', Auth::user()->firstname.' '.Auth::user()->lastname,['class'=>'form-control', 'readonly'=>'true']) !!}
			<!--{!! Form::text('conducted_by', Auth::user()->employee_id,['class'=>'form-control', 'readonly'=>'true']) !!}-->
			{!! Form::label('c_position', 'Position:') !!}
	        {!! Form::text('c_position', 'Position',['class'=>'form-control', 'readonly'=>'true']) !!}
	    </div>

		<div class="hide">
			<?php  $time = Carbon\Carbon::now(new DateTimeZone('Asia/Singapore')); ?>

			<!-- NOTIFICATIONS -->
			{!! Form::text('sender_id', Auth::user()->employee_id,['class'=>'form-control', 'readonly'=>'true', 'hidden'=>'true']) !!}
			{!! Form::text('receiver_id', '0',['class'=>'form-control', 'readonly'=>'true', 'hidden'=>'true']) !!}
			{!! Form::text('message', Auth::user()->firstname.' '.Auth::user()->lastname.' (ID: '.Auth::user()->employee_id . ') added a new report',['class'=>'form-control', 'readonly'=>'true', 'hidden'=>'true']) !!}	
			{!! Form::text('sent_at_date', $time->toDateString(),['class'=>'form-control datepicker', 'readonly'=>'true', 'hidden'=>'true']) !!}	
			{!! Form::text('sent_at_time', $time->toTimeString(),['class'=>'form-control datepicker', 'readonly'=>'true', 'hidden'=>'true']) !!}	
			
			<!-- USER ACTIVITY -->
			<!--{!! Form::text('employee_id', Auth::user()->employee_id,['class'=>'form-control', 'readonly'=>'true', 'hidden'=>'true']) !!}
			{!! Form::text('position', Auth::user()->position,['class'=>'form-control', 'readonly'=>'true', 'hidden'=>'true']) !!}
			{!! Form::text('employee_name', Auth::user()->firstname.' '.Auth::user()->lastname,['class'=>'form-control', 'readonly'=>'true', 'hidden'=>'true']) !!}
			{!! Form::text('activity', 'Submitted a new maintenance report',['class'=>'form-control', 'readonly'=>'true', 'hidden'=>'true']) !!}	
			{!! Form::text('sent_at_date', $time->toDateString(),['class'=>'form-control datepicker', 'readonly'=>'true', 'hidden'=>'true']) !!}	
			{!! Form::text('sent_at_time', $time->toTimeString(),['class'=>'form-control datepicker', 'readonly'=>'true', 'hidden'=>'true']) !!}	-->
		</div>

		<div class="input-field col s12">
        	<button class="btn btn-success" type="submit" name="action">Submit</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal" id="cancel-button">Cancel</button>
        </div><br><br>
	</form>
</div>

@endsection