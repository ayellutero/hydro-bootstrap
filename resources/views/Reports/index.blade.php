@extends('layouts.app')

@section('pageTitle', 'New Report')

@section('content')
<div class="card-panel"  style="margin:0%; margin-top:0%;">

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
					</option>
				@endforeach
			</select>
		</div>
		
		<h4 class="header2" style="padding-top:2%">PRE-REPAIR</h4>
		<div class="form-group">
	        {!! Form::label('monitoring_date', 'Date of Monitoring:') !!}
	        <input type="date" name="monitoring_date" class="datepicker" required>
	    </div>

		<div class="form-group">
	        {!! Form::label('init_findings', 'Initial Findings:') !!}
	        {!! Form::textarea('init_findings', null,['class'=>'form-control', 'required' => 'true']) !!}
	    </div>

		<div class="form-group">
	        {!! Form::label('rec_work', 'Recommended Work/s to be done:') !!}
	        {!! Form::textarea('rec_work', null,['class'=>'form-control', 'required' => 'true']) !!}
	    </div>

		<div class="form-group">
	        {!! Form::label('last_data', 'Last Date of Data:') !!}
	        <input type="date" name="last_data" class="datepicker" required>
	    </div>

		<div class="form-group"  style="padding-top:2%">
			{!! Form::label('assessed_by', 'Assessed by:') !!}
			<select class="selectpicker form-control" name="assessed_by[]" id="assessedBy" data-live-search="true" required multiple>
				@foreach($users as $user)
					<option value ="{{$user->firstname." ".$user->lastname}}">{{$user->firstname." ".$user->lastname}}</option>
				@endforeach
			</select>
		</div>

		<h4 class="header2" style="padding-top:2%">POST REPAIR</h4>
		<div class="form-group">
	        {!! Form::label('onsite_date', 'Date of Onsite:') !!}
	        <input type="date" name="onsite_date" class="datepicker" required>
	    </div>

	    <div class="form-group">
	        {!! Form::label('actual_findings', 'Actual Findings:') !!}
	        {!! Form::textarea('actual_findings', null,['class'=>'form-control', 'required' => 'true']) !!}
	    </div>

		<div class="form-group">
			{!! Form::label('work_done', 'Work/s Done:') !!}
	        <select class="selectpicker form-control" name="work_done[]" id="workDone" data-live-search="true" multiple>			
				@foreach($works as $work)
					<option value ="{{$work->work}}">{{$work->work}}</option>
				@endforeach
			</select>
		</div>

	    <div class="form-group">
	        {!! Form::label('part_installed', 'Parts Replaced/Installed:') !!}
			<select class="selectpicker form-control" name="part_installed[]" id="partInstalled" data-live-search="true" multiple>
				@foreach($parts as $part)
					<option value ="{{$part->part}}">{{$part->part}}</option>
				@endforeach
			</select>
	    </div>

	    <div class="form-group">
	        {!! Form::label('status', 'Status: ') !!}
	        <select class="form-control" name="status" id="part_installed" required>
				<option value ="Operational">Operational</option>
				<option value ="For Repair">For Repair</option>
				<option value ="Non-Operational">Non-Operational</option>
				<option value ="For Relocation">For Relocation</option>
            </select>
		</div>

	    <div class="form-group"  style="padding-top:2%">
			{!! Form::label('conducted_by', 'Conducted by:') !!}
			<select class="selectpicker form-control" name="conducted_by[]" id="conductedBy" data-live-search="true" required multiple>
				@foreach($users as $user)
					<option value ="{{$user->firstname." ".$user->lastname}}">{{$user->firstname." ".$user->lastname}}</option>
				@endforeach
			</select>
		</div>
		

		<div class="form-group"  style="padding-top:2%">
			{!! Form::label('supervisor', 'Verified by:') !!}
			<select class="form-control" name="supervisor" required>
				@foreach($users as $user)
					<option value ="{{$user->employee_id}}">{{$user->firstname." ".$user->lastname}}</option>
				@endforeach
			</select>
		</div>

		<div class="hide">
			{!! Form::text('submitted_by', Auth::user()->employee_id,['class'=>'form-control', 'readonly'=>'true']) !!}
		</div>

		<div class="hide">

			<?php  $time = Carbon\Carbon::now(new DateTimeZone('Asia/Singapore')); ?>
			<!-- USER ACTIVITY -->
			{!! Form::text('empID', Auth::user()->employee_id,['class'=>'form-control', 'readonly'=>'true', 'hidden'=>'true']) !!}
			{!! Form::text('employee_position', Auth::user()->designation,['class'=>'form-control', 'readonly'=>'true', 'hidden'=>'true']) !!}
			{!! Form::text('employee_name', Auth::user()->firstname.' '.Auth::user()->lastname,['class'=>'form-control', 'readonly'=>'true', 'hidden'=>'true']) !!}
			{!! Form::text('activity', 'Submitted a new maintenance report',['class'=>'form-control', 'readonly'=>'true', 'hidden'=>'true']) !!}	
			{!! Form::text('sent_at_date', $time->toDateString(),['class'=>'form-control datepicker', 'readonly'=>'true', 'hidden'=>'true']) !!}	
			{!! Form::text('sent_at_time', $time->toTimeString(),['class'=>'form-control datepicker', 'readonly'=>'true', 'hidden'=>'true']) !!}	
		</div>

		<div class="input-field col s12">
        	<button class="btn btn-success" type="submit" name="action">Submit</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal" id="cancel-button">Cancel</button>
        </div><br><br>
	</form>
</div>

@endsection