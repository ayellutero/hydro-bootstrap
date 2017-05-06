@extends('layouts.app')
 
@section('content')

@if(Session::has('message'))
<div class="alert alert-success alert-dismissable">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  {{ Session::get('message') }}
</div>
@endif

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <a class="btn" data-toggle="modal" data-target="#confirmDelete"><i class="fa fa-trash fa-2x" aria-hidden="true"></i></a>
                Notification
            </div>
            <div class="panel-body">
                <table id="all-notifs" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead> 
                        <td></td>
                        <td></td>
                    </thead>
                    <tbody>
                        <?php $notifs = DB::table('notifications')->get(); ?>
                        @foreach ($notifs as $notif)
                            @if($notif->receiver_id == Auth::user()->employee_id)
                            <tr>
                                <td>{{ \Carbon\Carbon::parse($notif->sent_at_date)->format('M d, Y') . " at " . \Carbon\Carbon::parse($notif->sent_at_time)->format('h:i A') }}</td>
                                <td>
									<a href="#" >
                                        {{ $notif->message . "."}}
									</a>
                                </td>
                            </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>

                <!-- Modal -->
                <div id="confirmDelete" class="modal fade" role="dialog">
                    <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Clear Notifications</h4>
                            </div>
                            <div class="modal-body">
                                Are you sure you want to delete all your notifications?
                            </div>
                            <div class="modal-footer">
                                {!! Form::open(['method' => 'DELETE','route' => ['notifications.destroy', Auth::user()->employee_id]]) !!}
                                <button class="btn btn-success" type="submit" name="action">Delete</button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal" id="cancel-button">Cancel</button>
                                {{ Form::close() }}
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
  
@endsection



