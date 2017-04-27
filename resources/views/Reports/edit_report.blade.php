<h4 class="header2">Maintenance Form</h4>
    <!-- FIX FORM -->

    <div class="form-group">
        {!! Form::label('station_name', 'Station Name:') !!}
        {!! Form::text('station_name', $report->station_name,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('location', 'Location (Town, Province):') !!}
        {!! Form::text('location', $report->location,['class'=>'form-control']) !!}

    </div>
    <div class="form-group">
        {!! Form::label('sensor_type', 'Sensor Type:') !!}   
        <select class="browser-default" name="sensor_type">
            <option id="st_opt1" value ="ARG">ARG</option>
            <option id="st_opt2" value ="WLMS">WLMS</option>
            <option id="st_opt3" value ="TDM">TDM</option>
            <option id="st_opt4" value ="AWS">AWS</option>
        </select>
    </div>


    <h4 class="header2" style="padding-top:2%">INITIAL ASSESSMENT</h4>
    <div class="form-group">
        {!! Form::label('date_assessed', 'Date Assessed:') !!}
        <input type="date" name="date_assessed" class="datepicker" value="<?= $report->date_assessed?>">

    </div>
    <div class="form-group">
        {!! Form::label('problem', 'Problem/s:') !!}
        {!! Form::textarea('problem', $report->problem,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('work_tdone', 'Work/s to be done:') !!}
        {!! Form::textarea('work_tdone', $report->work_tdone,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('last_data', 'Last Data:') !!}
        {!! Form::textarea('last_data', $report->last_data,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('init_remarks', 'Remarks:') !!}
        {!! Form::textarea('init_remarks', $report->init_remarks,['class'=>'form-control']) !!}
    </div>

    <h4 class="header2" style="padding-top:2%">ONSITE VISIT</h4>
    <div class="form-group">
        {!! Form::label('date_visited', 'Date Visited:') !!}
        <input type="date" name="date_visited" class="datepicker" value="<?= $report->date_visited ?>">
    </div>
    <div class="form-group">
        {!! Form::label('actual_defects', 'Actual Defect/s:') !!}
        {!! Form::textarea('actual_defects', $report->actual_defects,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('work_done', 'Work/s done:') !!}
        {!! Form::textarea('work_done', $report->work_done,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('part_replaced', 'Part/s Replaced (if any):') !!}
        {!! Form::textarea('part_replaced', $report->part_replaced,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('tp_results', 'Test Points Results (if performed):') !!}
        {!! Form::textarea('tp_results', $report->tp_results,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('rc_performed', 'Remote Commands Performed:') !!}
        {!! Form::textarea('rc_performed', $report->rc_performed,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('onsite_remarks', 'Remarks:') !!}
        {!! Form::textarea('onsite_remarks', $report->onsite_remarks,['class'=>'form-control']) !!}
    </div><br>

    <div class="form-group"  style="padding-top:2%">
        {!! Form::label('conducted_by', 'Conducted by:') !!}
        {!! Form::text('conducted_by', Auth::user()->employee_id,['class'=>'form-control', 'readonly'=>'true']) !!}
        {!! Form::label('c_position', 'Position:') !!}
        {!! Form::text('c_position', 'Position',['class'=>'form-control', 'readonly'=>'true']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('noted_by', 'Noted by:', ['hidden'=>'true']) !!}
        <input type="text" name="noted_by" placeholder="Unit Head" value="Unit Head Name" hidden/><br>
        {!! Form::label('n_position', 'Position:', ['hidden'=>'true']) !!}
        {!! Form::text('n_position', 'Unit Head',['class'=>'form-control', 'readonly'=>'true', 'hidden'=>'true']) !!}
        {!! Form::text('if_approved', '0',['class'=>'form-control', 'hidden'=>'true']) !!}
    </div>
    <br><br>

    <div class="hide">
        <?php  $time = Carbon\Carbon::now(new DateTimeZone('Asia/Singapore')); ?>
        <!-- NOTIFICATIONS -->
		{!! Form::text('sender_id', Auth::user()->employee_id,['class'=>'form-control', 'readonly'=>'true', 'hidden'=>'true']) !!}
		{!! Form::text('receiver_id', '201229207',['class'=>'form-control', 'readonly'=>'true', 'hidden'=>'true']) !!}
		{!! Form::text('message', Auth::user()->employee_id . ' added a new report',['class'=>'form-control', 'readonly'=>'true', 'hidden'=>'true']) !!}	
		{!! Form::text('sent_at_date', $time->toDateString(),['class'=>'form-control datepicker', 'readonly'=>'true', 'hidden'=>'true']) !!}	
		{!! Form::text('sent_at_time', $time->toTimeString(),['class'=>'form-control datepicker', 'readonly'=>'true', 'hidden'=>'true']) !!}	
		
        <!-- USER ACTIVITY -->
		{!! Form::text('employee_id', Auth::user()->employee_id,['class'=>'form-control', 'readonly'=>'true', 'hidden'=>'true']) !!}
		{!! Form::text('position', Auth::user()->position,['class'=>'form-control', 'readonly'=>'true', 'hidden'=>'true']) !!}
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
