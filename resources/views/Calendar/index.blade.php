@extends('layouts.app')

@section('content')

@if(Session::has('message'))
<div class="alert alert-success alert-dismissable">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  {{ Session::get('message') }}
</div>
@endif

<div id="full-calendar" class="row card-panel" style="margin:1.5%; margin-top:0%; text-align: center;">
    <div class="divider"></div><br>
    <div class="col s11 m7 l6">
        <div id='calendar'></div>
    </div>

    @if ( Auth::user()->hasRole('Admin') || Auth::user()->hasRole('Head') ? 'checked' : '' )
    <div>
        <a class="btn btn-success" data-toggle="modal" data-target="#createSched"><i class="fa fa-plus" aria-hidden="true"></i> Create New Schedule</a> 
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
    @endif
    <br>
</div>


@endsection