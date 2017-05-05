@extends('layouts.app')
 
@section('content')

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading"> Notifications </div>

            <div class="panel-body">
                <table id="all-notifs" class="table table-striped table-bordered" cellspacing="0" width="100%">
                  
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
            </div>
        </div>
    </div>
</div>
  
@endsection



