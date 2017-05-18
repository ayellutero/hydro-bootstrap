<h4 class="header2">Maintenance Form</h4>
    <!-- FIX FORM -->

        <div class="hide">
			{!! Form::text('emp_id',Auth::user()->employee_id,['class'=>'form-control', 'hidden' =>'true', 'readonly'=>'true']) !!}
		</div>
		<div class="form-group">
			{!! Form::label('station_name', 'Station:') !!}
            {!! Form::text('s_name', $report->station_id.' '.$report->location,['class'=>'form-control', 'readonly'=>'true']) !!}
		</div>
		
		<h4 class="header2" style="padding-top:2%">PRE-REPAIR</h4>
		<div class="form-group">
	        {!! Form::label('monitoring_date', 'Date of Monitoring:') !!}
	        <input type="date" name="monitoring_date" class="datepicker form-control" value="{{ date('Y-m-d', strtotime($report->monitoring_date))}}" required>
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
	        <input type="date" name="last_data" class="datepicker form-control" value="{{ date('Y-m-d', strtotime($report->last_data))}}" required>
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
	        <input type="date" name="onsite_date" class="datepicker form-control" value="{{ date('Y-m-d', strtotime($report->onsite_date))}}" required>
	    </div>

	    <div class="form-group">
	        {!! Form::label('actual_findings', 'Actual Findings:') !!}
	        {!! Form::textarea('actual_findings', null,['class'=>'form-control', 'required' => 'true']) !!}
	    </div>

		<div class="form-group">
			{!! Form::label('work_done', 'Work/s Done:') !!}
	        <select class="selectpicker form-control" name="work_done[]" id="workDone" data-live-search="true" required multiple>
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
	        <select class="form-control" name="status" id="part_replaced" required>
				<option value ="Operational">Operational</option>
				<option value ="For Repair">For Repair</option>
				<option value ="Non-Operational">Non-Operational</option>
				<option value ="For Relocation">For Relocation</option>
            </select>
		</div>

	    <div class="form-group"  style="padding-top:2%">
			{!! Form::label('conducted_by', 'Conducted by:') !!}
			{!! Form::text('c_by', $report->conducted_by,['class'=>'form-control', 'readonly' => 'true']) !!}
		</div>

		<div class="form-group"  style="padding-top:2%">
			{!! Form::label('supervisor', 'Supervisor:') !!}
			{!! Form::text('supervisor_name', $report->supervisor,['class'=>'form-control', 'readonly' => 'true']) !!}
		</div>
        <br><br>

    <div class="hide">
        <?php  $time = Carbon\Carbon::now(new DateTimeZone('Asia/Singapore')); ?>
       
        <!-- USER ACTIVITY -->
		{!! Form::text('empID', Auth::user()->employee_id,['class'=>'form-control', 'readonly'=>'true', 'hidden'=>'true']) !!}
		{!! Form::text('employee_position', Auth::user()->desgination,['class'=>'form-control', 'readonly'=>'true', 'hidden'=>'true']) !!}
		{!! Form::text('employee_name', Auth::user()->firstname.' '.Auth::user()->lastname,['class'=>'form-control', 'readonly'=>'true', 'hidden'=>'true']) !!}
		{!! Form::text('activity', 'Edited a maintenance report',['class'=>'form-control', 'readonly'=>'true', 'hidden'=>'true']) !!}	
		{!! Form::text('sent_at_date', $time->toDateString(),['class'=>'form-control datepicker', 'readonly'=>'true', 'hidden'=>'true']) !!}	
		{!! Form::text('sent_at_time', $time->toTimeString(),['class'=>'form-control datepicker', 'readonly'=>'true', 'hidden'=>'true']) !!}	
	</div>

  <!--  <script>
    $(document).ready(function() {
        $('select').material_select();
        
        $sensorType = $report->sensor_type;
        if($sensorType == "ARG"){
            $("#st_opt1").attr("selected", "true");
        }else if($sensorType == "WLMS"){
            $("#st_opt2").attr("selected", "true");
        }else if($sensorType == "TDM"){
            $("#st_opt3").attr("selected", "true");
        }else{
            $("#st_opt4").attr("selected", "true");
        }
		
    });

    </script>-->
