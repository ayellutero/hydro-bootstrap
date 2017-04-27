@extends('layouts.app')
 
@section('content')

<div class="card-panel" style="margin:1.5%; text-align: center;">
    <h5>NOTIFICATIONS</h5>
</div>
<div class="card-panel">
	<div class="col s12 m8 l9">
		<div class="collection">
		@foreach($notifications as $notif)
			@if($notif->is_read == 0 && $notif->receiver_id == Auth::user()->employee_id)
			<a href="#!"  class="collection-item" >
					{{ $notif->message . " on " . $notif->sent_at_date . " at " . $notif->sent_at_time}}.
					<!--<button class="waves-effect waves-light btn modal-trigger  light-blue modal-trigger" href="##">View</button>-->
			</a>
			
			@endif
		@endforeach
		</div>
	</div>

</div>
  
@endsection



