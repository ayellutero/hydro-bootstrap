@extends('layouts.app')

@section('content')
<div id="full-calendar" class="row card-panel" style="margin:1.5%; margin-top:0%; text-align: center;">
    <div class="divider"></div><br>
    <div class="col s11 m7 l6">
        <div id='calendar'></div>
    </div>

    <div>
        <a class="btn btn-success" data-toggle="modal" data-target="#createSched" onclick="createSched()"><i class="fa fa-plus" aria-hidden="true"></i> Create New Schedule</a>
    </div>

    <!-- View Report Modal -->
    <div id="createSched" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">New Sched</h4>
                </div>
                
                <div class="modal-body">
                        1. When <br>
                        2. Station <br>
                        3. Staff-in-charge <br>
                        4. Notify via text/email every ____
                </div>
                <div class="modal-footer">
                    <button   id="button_id" class="btn btn-success" type="submit" name="action">Create</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <br>
</div>


<script>

function createSched(){
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
/*
        var date = new Date();
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
</script>
@endsection