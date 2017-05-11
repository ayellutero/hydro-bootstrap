@extends('layouts.app')

@section('content')

@if(Session::has('message'))
<div class="alert alert-success alert-dismissable">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>{{ Session::get('message') }}</strong>
</div>
@elseif(Session::has('error'))
<div class="alert alert-danger alert-dismissable">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>{{ Session::get('error') }}</strong>
</div>
@endif
<style>	
#external-events {
    float: left;
    width: 22%;
    padding: 1%;
    border: none;
    text-align: left;
    overflow: auto;
}
    
#external-events .fc-event {
    margin: 10px 0;
    cursor: pointer;
}
    
#calendar {
    float: right;
    width: 75%;
}

</style>

<div id="full-calendar" class="row card-panel" style="margin:1.5%; margin-top:0%; text-align: center;">
    
    <br>
    <div id='external-events'>
        @if ( Auth::user()->hasRole('Admin') || Auth::user()->hasRole('Head') ? 'checked' : '' )
            <div style="margin: 1%; float: left">
                <a style="width: 100px;" class="btn btn-success withTooltip" title="New Schedule" data-toggle="modal" data-target="#createSched"><i class="fa fa-plus" aria-hidden="true"></i> New</a> 
            </div>

            <!-- Create Sched Modal -->
            <div id="createSched" class="modal fade" role="dialog">
                <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Schedule New Maintenance</h4>
                        </div>
                        
                        <div class="modal-body" style="text-align: left">
                            {!! Form::open(['url' => 'calendar']) !!}
                                <div class="form-group">
                                    {!! Form::label('title', 'Station Name:') !!}
                                    <select class="form-control" name="title" id="title" required>
                                    @foreach($stations as $station)
                                            <option value ="{{$station->device_id ." ". $station->location}}">{{ $station->device_id . " " . $station->location }}</option>
                                    @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    {!! Form::label('start_date_label', 'Date:') !!}
                                    <input type="date" name="start_date" class="datepicker" required>
                                </div>

                                <div class="form-group">
                                    {!! Form::label('staff-in-charge', 'Staff-in-Charge:') !!}   
                                    <select class="form-control" name="staff" id="staff" required>
                                    @foreach($users as $user)
                                            <option value ="{{$user->employee_id}}">{{ $user->lastname . ", " . $user->firstname }}</option>
                                    @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <div id="notify_sms">
                                        {{ Form::checkbox('notify_sms', 1) }}
                                        {!! Form::label('notify-via', 'Notify via SMS') !!}
                                    </div>
                                    <br>
                                    <i>Reminders will automatically be sent via electronic mail.</i>
                                </div>
                        </div>

                        <div class="hide">
                            <?php  $time = Carbon\Carbon::now(new DateTimeZone('Asia/Singapore')); ?>

                            <!-- NOTIFICATIONS -->
                            {!! Form::text('sender_id', Auth::user()->employee_id,['class'=>'form-control', 'readonly'=>'true', 'hidden'=>'true']) !!}
                            {!! Form::text('receiver_id', '0',['class'=>'form-control', 'readonly'=>'true', 'hidden'=>'true']) !!}
                            {!! Form::text('message', Auth::user()->employee_id . ' scheduled you for a maintenance. See e-mail for the details.',['class'=>'form-control', 'readonly'=>'true', 'hidden'=>'true']) !!}	
                            {!! Form::text('sent_at_date', $time->toDateString(),['class'=>'form-control datepicker', 'readonly'=>'true', 'hidden'=>'true']) !!}	
                            {!! Form::text('sent_at_time', $time->toTimeString(),['class'=>'form-control datepicker', 'readonly'=>'true', 'hidden'=>'true']) !!}	
                            
                            <!-- USER ACTIVITY -->
                            {!! Form::text('employee_id', Auth::user()->employee_id,['class'=>'form-control', 'readonly'=>'true', 'hidden'=>'true']) !!}
                            {!! Form::text('position', Auth::user()->position,['class'=>'form-control', 'readonly'=>'true', 'hidden'=>'true']) !!}
                            {!! Form::text('employee_name', Auth::user()->firstname.' '.Auth::user()->lastname,['class'=>'form-control', 'readonly'=>'true', 'hidden'=>'true']) !!}
                            {!! Form::text('activity', 'Scheduled a station maintenance',['class'=>'form-control', 'readonly'=>'true', 'hidden'=>'true']) !!}	
                            {!! Form::text('sent_at_date', $time->toDateString(),['class'=>'form-control datepicker', 'readonly'=>'true', 'hidden'=>'true']) !!}	
                            {!! Form::text('sent_at_time', $time->toTimeString(),['class'=>'form-control datepicker', 'readonly'=>'true', 'hidden'=>'true']) !!}	
                        </div>
                        <div class="modal-footer">
                            <button   id="button_id" class="btn btn-success" type="submit" name="action">Create</button>
                            {{ Form::close() }}
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            <br><br>
        @endif
        
        <div id="eventDetails">
            <h4 id="eventTitle"><strong>Station:</strong></h4>
            <div class="form-group" id="eventDate">
                {!! Form::label('eventDate', 'Date:') !!}
                {!! Form::text('eventDate', null,['class'=>'form-control', 'readonly' => 'true']) !!}
	        </div>
            <div class="form-group" id="eventStaff">
                {!! Form::label('eventStaff', 'Staff-in-charge:') !!}
                {!! Form::text('eventStaff', null,['class'=>'form-control', 'readonly' => 'true']) !!}
	        </div>
            <div class="form-group" id="eventEmail">
                {!! Form::label('eventEmail', 'Email:') !!}
                {!! Form::text('eventEmail', null,['class'=>'form-control', 'readonly' => 'true']) !!}
	        </div>
            <div class="form-group" id="eventPerformed">
                {!! Form::label('eventPerformed', 'Performed:') !!}
                {!! Form::text('eventPerformed', null,['class'=>'form-control', 'readonly' => 'true']) !!}
	        </div>

        </div>
    </div>

    <!-- Modal -->
    <div id="confirmDelete" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Delete Schedule</h4>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this schedule?
                    
                </div>
                <div class="modal-footer">
                    <div id="modalEventID"></div>
                    {!! Form::open(['method' => 'DELETE','route' => ['calendar.destroy', 0]]) !!}
                    <div class="form-group" id="eventID">
                    </div>
                    <button class="btn btn-success" type="submit" name="action">Delete</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal" id="cancel-button">Cancel</button>
                    {{ Form::close() }}
                </div>
            </div>

        </div>
    </div>
    <div class="col s11 m7 l6">
        <div id='calendar'></div>
    </div>

    
    <br>
</div>


@endsection