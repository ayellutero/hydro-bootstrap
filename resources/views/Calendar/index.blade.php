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

    <div>
        <a class="btn btn-success" data-toggle="modal" data-target="#createSched"><i class="fa fa-plus" aria-hidden="true"></i> Create New Schedule</a>
    </div>

    <!-- View Report Modal -->
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
                        <div class="form-group hide">
                            {!! Form::text('title', 'Station maintenance',['class'=>'form-control', 'required' => 'true']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('station_label', 'Station Name:') !!}
                            {!! Form::text('station', null,['class'=>'form-control', 'required' => 'true']) !!}
	                    </div>

                        <div class="form-group">
                            {!! Form::label('start_date_label', 'Date:') !!}
                            <input type="date" name="start_date" class="datepicker" required>
                        </div>

                        <div class="form-group">
                            {!! Form::label('staff-in-charge', 'Staff-in-Charge:') !!}
                            {!! Form::text('staff', null,['class'=>'form-control', 'required' => 'true']) !!}
	                    </div>

                        <div class="form-group">
                            {!! Form::label('notify-via', 'Notify via:') !!}
                            <br>
                            <div id="notify_email">
                                {{ Form::checkbox('notify_email', true) }} E-mail
                            </div>
                            {!! Form::text('email_to_notif', null,['id' => 'email_notif', 'class'=>'form-control']) !!}
                            <br>
                            <div id="notify_sms">
                                {{ Form::checkbox('notify_sms', 'true') }} SMS
                            </div>
                            {!! Form::text('sms_to_notif', null,['id' => 'sms_notif', 'class'=>'form-control']) !!}
                            
	                    </div>
                </div>
                <div class="modal-footer">
                    <button   id="button_id" class="btn btn-success" type="submit" name="action">Create</button>
                     {{ Form::close() }}
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <br>
</div>


<script>

function createSched(){
    alert('HELLO');
   /* var date = new Date();
        var d = date.getDate();
        var m = date.getMonth();
        var y = date.getFullYear();

       $('#button_id').click(function() {
            var newEvent = {
                title: 'NEW EVENT',
                start: new Date(y, m, d)
            };
            $('#calendar').fullCalendar( 'renderEvent', newEvent , 'stick');
        });

*/



     /*   $event = \Calendar::event(
            "Valentine's Day", //event title
            true, //full day event?
            '2017-05-14', //start time, must be a DateTime object or valid DateTime format (http://bit.ly/1z7QWbg)
            '2017-05-14', //end time, must be a DateTime object or valid DateTime format (http://bit.ly/1z7QWbg),
            1, //optional event ID
            [
                'url' => 'http://full-calendar.io'
            ]
        );

        $('#calendar').fullCalendar( 'renderEvent', $event , 'stick');*/
}

</script>
@endsection