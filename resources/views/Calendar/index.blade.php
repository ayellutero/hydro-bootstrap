@extends('layouts.app')

@section('content')

<div id="full-calendar" class="row card-panel" style="margin:1.5%; margin-top:0%; text-align: center;">
    <div class="divider"></div><br>
    <!--<div class="col s12 m4 l3">
        
        <h4 class="header">Draggable Events</h4>
        <div class='fc-event cyan'>March Invoices</div>
        <div class='fc-event teal'>Call Emy</div>
        <div class='fc-event cyan darken-1'>Dinner with Team</div>
        <div class='fc-event cyan accent-4'>Meeting with Support Team</div>
        <div class='fc-event teal accent-4'>Meeting with Sales Team</div>
        <div class='fc-event light-blue accent-3'>Design an iOS App</div>
        <div class='fc-event light-blue accent-4'>Company Party</div>
        <p>
            <input type='checkbox' id='drop-remove' />
            <label for='drop-remove'>remove after drop</label>
        </p>
        </div>
    </div> -->
    <div class="col s12 m8 l7">
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
                    <h4 class="modal-title">New Sched</h4>
                </div>
                
                <div class="modal-body">
                        1. When <br>
                        2. Station <br>
                        3. Staff-in-charge <br>
                        4. Notify via text/email every ____
                </div>
                <div class="modal-footer">
                    <button class="btn btn-success" type="submit" name="action">Create</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <div id="modal-fixed-footer">
        <div id="createSched" class="modal modal-fixed-footer">
            <div class="modal-content">
                <div class="modal-header"></div>
               
            </div>
            <div class="modal-footer">
                <!-- OPEN FORM -->
                <!-- <button class="waves-effect btn-flat" type="submit" name="action">Create</button> -->
                <!-- CLOSE FORM -->

                <a href="#" class="waves-effect btn-flat modal-action modal-close">Create</a>
                <a href="#" class="waves-effect btn-flat modal-action modal-close">Close</a>
            </div>
        </div>
    </div>
    <br>
</div>



@endsection